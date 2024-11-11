<?php

declare(strict_types=1);

test('guests are redirected to login when accessing /clients', function () {
    $response = $this->get('/clients');

    $response->assertRedirect(route('login-form'));
});
