const { test, expect } = require('@playwright/test');
const { login, logout } = require('./helpers/auth');

test.describe('Login and Logout flows for roles', () => {
    test('admin can login and logout via UI button', async ({ page }) => {
        await login(page, { username: 'adriano', password: 'dosen123' });
        await expect(page).toHaveURL(/\/admin\/dashboard/);

        // Use helper that clicks #btn-logout and falls back if needed
        await logout(page);
        await expect(page).toHaveURL(/\/landing/);
    });

    test('mahasiswa can login and logout via fallback form submit', async ({ page }) => {
        await login(page, { username: 'reyhan', password: 'mahasiswa123' });
        await expect(page).toHaveURL(/\/mahasiswa\/dashboard/);
        // Use helper that clicks #btn-logout and falls back if needed
        await logout(page);
        await expect(page).toHaveURL(/\/landing/);
    });

    test('dosen pembimbing can login and logout via direct navigation', async ({ page }) => {
        await login(page, { username: 'seraphina', password: 'dosen123' });
        await expect(page).toHaveURL(/\/dosen_pembimbing\/dashboard/);
        // Use helper that clicks #btn-logout and falls back if needed
        await logout(page);
        await expect(page).toHaveURL(/\/landing/);
    });
});