<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use App\Models\Content\Order;
use App\Models\Course;
use App\Models\Application;
use App\Models\Content\Setting;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
  use DisableForeignKeys;

  /**
   * Run the database seed.
   */
  public function run()
  {
    $this->disableForeignKeys();

    // Create Roles
    Role::create([
      'id' => 1,
      'type' => User::TYPE_ADMIN,
      'name' => 'Administrator',
    ]);

    Role::create([
      'id' => 2,
      'type' => User::TYPE_USER,
      'name' => 'Customer',
    ]);

    // Non Grouped Permissions
    //

    // Grouped permissions
    // Users category
    $users = Permission::create([
      'type' => User::TYPE_ADMIN,
      'name' => 'admin.access.user',
      'description' => 'All User Permissions',
    ]);

    $users->children()->saveMany([
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.list',
        'description' => 'View Users',
      ]),
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.deactivate',
        'description' => 'Deactivate Users',
        'sort' => 2,
      ]),
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.reactivate',
        'description' => 'Reactivate Users',
        'sort' => 3,
      ]),
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.clear-session',
        'description' => 'Clear User Sessions',
        'sort' => 4,
      ]),
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.impersonate',
        'description' => 'Impersonate Users',
        'sort' => 5,
      ]),
      new Permission([
        'type' => User::TYPE_ADMIN,
        'name' => 'admin.access.user.change-password',
        'description' => 'Change User Passwords',
        'sort' => 6,
      ]),
    ]);

    // Assign Permissions to other Roles
    //
    $sanad = Permission::create([
      'type' => Application::TYPE_ADMIN,
      'name' => 'admin.sanad',
      'description' => 'All Sanad Related Permission',
    ]);
    $sanad->children()->saveMany([
      new Permission([
        'type' => Application::TYPE_ADMIN,
        'name' => 'admin.sanad.application.view',
        'description' => 'View Sanad Application',

      ]),
      new Permission([
        'type' => Application::TYPE_ADMIN,
        'name' => 'admin.sanad.download.sanad',
        'description' => 'Download Salad File',

      ]),
      new Permission([
        'type' => Application::TYPE_ADMIN,
        'name' => 'admin.sanad.status',
        'description' => 'Change Status For Sanad Application',

      ]),
      new Permission([
        'type' => Application::TYPE_ADMIN,
        'name' => 'admin.sanad.apply',
        'description' => 'Apply Sanad For Non-Registered User',

      ]),
    ]);
    $course = Permission::create([
      'type' => Course::TYPE_ADMIN,
      'name' => 'admin.computer',
      'description' => 'All Computer Training Related Permissions',
    ]);
    $course->children()->saveMany([
      new Permission([
        'type' => Course::TYPE_ADMIN,
        'name' => 'admin.computer.course.edit',
        'description' => 'Edit Computer Course',

      ]),
      new Permission([
        'type' => Course::TYPE_ADMIN,
        'name' => 'admin.computer.application.view',
        'description' => 'View Computer Course Applications',

      ]),
      new Permission([
        'type' => Course::TYPE_ADMIN,
        'name' => 'admin.computer.upload.certificate',
        'description' => 'Upload Computer Course Certificate',

      ]),
      new Permission([
        'type' => Course::TYPE_ADMIN,
        'name' => 'admin.computer.status',
        'description' => 'Change Status For Computer Training',

      ]),
    ]);

    $settings = Permission::create([
      'type' => Setting::TYPE_ADMIN,
      'name' => 'admin.settings',
      'description' => 'Settings Permissions',
    ]);

    $this->enableForeignKeys();
  }
}
