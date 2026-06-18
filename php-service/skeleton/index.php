<?php

// PHP service scaffolded from the securestack-idp golden path template.
// Service: ${{ values.name }}

declare(strict_types=1);

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

header('Content-Type: application/json');

switch ($requestPath) {
    case '/health':
        echo json_encode([
            'status' => 'healthy',
            'service' => '${{ values.name }}',
        ]);
        break;

    case '/version':
        echo json_encode([
            'version' => '1.0.0',
        ]);
        break;

    default:
        http_response_code(404);
        echo json_encode([
            'error' => 'Not found',
        ]);
        break;
}
