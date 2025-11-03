// Example tests for login and basic redirect checks for each role.
// After you send controllers/views, I'll expand these tests with UI-specific assertions.

const { test, expect } = require('@playwright/test');
const { login } = require('./helpers/auth');

test.describe('Login flows for roles', () => {
  test('admin can login and reach admin dashboard', async ({ page }) => {
    await login(page, { username: 'adriano', password: 'dosen123' });

    // Expect to be on admin dashboard (adjust if controller redirects elsewhere)
    await expect(page).toHaveURL(/\/admin\/dashboard/);

    // Optional: check presence of logout link (common route in your routes)
    await expect(page.locator('a[href="/logout"]')).toBeVisible();
  });

  test('dosen pembimbing can login and reach dosen_pembimbing dashboard', async ({ page }) => {
    await login(page, { username: 'seraphina', password: 'dosen123' });
    await expect(page).toHaveURL(/\/dosen_pembimbing\/dashboard/);
    await expect(page.locator('a[href="/logout"]')).toBeVisible();
  });

  test('mahasiswa can login and reach mahasiswa dashboard', async ({ page }) => {
    await login(page, { username: 'reyhan', password: 'mahasiswa123' });
    await expect(page).toHaveURL(/\/mahasiswa\/dashboard/);
    await expect(page.locator('a[href="/logout"]')).toBeVisible();
  });
});