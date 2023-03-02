<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    public function test_login_and_display_post(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/post/1')
                    ->assertSee('Show Post n°1');
        });
    }

    public function test_nav_basic(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/')
                ->clickLink('Posts')
                ->assertSee('Post List');
        });
    }

    public function test_nav_admin_switch_cannot_delete_posts(): void
    {
        // Test
        // Connect as admin
        // Visit route post.index
        // Click on Privilege link ('Grant')
        // Assert Second post has not a delete btn
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('post.index')
                ->clickLink('Grant')
                ->assertDontSeeIn('table tr:nth-child(2) form', 'Delete');
        });
    }

    public function test_nav_admin_can_delete_posts(): void
    {
        // Test
        // Connect as admin
        // Visit route post.index
        // Click on Privilege link ('Grant')
        // Assert Second post has a delete btn
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('post.index')
                ->clickLink('Grant')
                ->assertSeeIn('table tr:nth-child(2) form', 'Delete');
        });
    }
}
