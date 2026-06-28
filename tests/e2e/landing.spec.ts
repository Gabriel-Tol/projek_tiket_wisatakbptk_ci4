import { test, expect } from '@playwright/test';

test.describe('Landing and Destinasi pages', () => {
  test('landing page loads and has Destinasi link', async ({ page }) => {
    await page.goto('/');
    // Check main navigation or link that leads to destinasi
    const destinasiLink = page.locator('text=Destinasi');
    await expect(destinasiLink).toBeVisible({ timeout: 5000 });
  });

  test('destinasi listing accessible', async ({ page }) => {
    await page.goto('/destinasi');
    // Expect some table or card list text
    const heading = page.locator('text=Destinasi Wisata');
    await expect(heading.first()).toBeVisible({ timeout: 5000 });
  });
});
