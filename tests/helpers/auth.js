// Helper login & logout functions for Playwright tests.
// Login: isi form login dan submit.
// Logout: klik tombol #btn-logout, tunggu navigasi, fallback submit form #logout-form atau goto /logout.

async function login(page, { username, password }) {
  await page.goto('/login');

  // Fill login form (controller expects 'username' and 'password' inputs)
  await page.fill('input[name="username"]', username);
  await page.fill('input[name="password"]', password);

  // Submit and wait navigation
  await Promise.all([
    page.waitForNavigation(),
    page.click('button[type="submit"]'),
  ]);
}

async function logout(page) {
  // Try click the visible logout button first (matches your HTML)
  try {
    await page.waitForSelector('#btn-logout', { state: 'visible', timeout: 5000 });
    await page.click('#btn-logout');

    // Wait for navigation triggered by the click (if any)
    await page.waitForNavigation({ timeout: 5000 });
    // Ensure we're on landing (controller redirects to /landing)
    await page.waitForURL('**/landing', { timeout: 5000 });
    return;
  } catch (err) {
    // If clicking didn't cause navigation within timeout, try fallback strategies below
  }

  // Fallback 1: submit the hidden form if present
  const hasForm = await page.$('#logout-form');
  if (hasForm) {
    await page.evaluate(() => {
      const f = document.getElementById('logout-form');
      if (f) f.submit();
    });
    await page.waitForURL('**/landing', { timeout: 5000 });
    return;
  }

  // Fallback 2: direct navigation to route (last resort)
  await page.goto('/logout');
  await page.waitForURL('**/landing', { timeout: 5000 });
}

module.exports = { login, logout };