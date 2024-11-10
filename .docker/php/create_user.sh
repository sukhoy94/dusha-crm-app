#!/bin/sh

IS_TEST_USER_ALREADY_EXISTS=$(php artisan tinker --execute="echo App\\Models\\User::where('email', 'dummy@example.com')->exists();")

if [ "$IS_TEST_USER_ALREADY_EXISTS" = "" ]; then
  php artisan tinker --execute="App\\Models\\User::create(['name' => 'Dummy User', 'email' => 'dummy@example.com', 'password' => bcrypt('password')]);"
  echo "Dummy user created."
else
  echo "Dummy user already exists."
fi
