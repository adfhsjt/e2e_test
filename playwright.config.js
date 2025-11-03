// Playwright config (JavaScript)
const { defineConfig } = require('@playwright/test');

module.exports = defineConfig({
  testDir: './tests',
  timeout: 30_000,
  expect: {
    timeout: 10_000,
  },
  use: {
    baseURL: process.env.BASE_URL || 'http://localhost:8000',
    headless: true,
    viewport: { width: 1280, height: 720 },
    actionTimeout: 10_000,
    trace: 'on-first-retry',
  },
  retries: process.env.CI ? 2 : 0,
  reporter: [['list']],
});