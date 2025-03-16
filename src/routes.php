<?php
$twig = require_once __DIR__ . '/bootstrap.php';

// Hardcoded Data
$data = [
    'title' => 'College Attendance Management',
    'menu' => [
        'Dashboard' => '/',
        'Attendance' => '/attendance',
        'Courses' => '/courses',
        'Faculty' => '/faculty',
    ],
    'student' => [
        'name' => 'John Doe',
        'id' => 'S12345',
        'course' => 'Computer Science',
        'year' => '2nd Year'
    ],
    'attendance' => [
        ['date' => '2025-03-01', 'subject' => 'Math', 'status' => 'Present'],
        ['date' => '2025-03-02', 'subject' => 'Physics', 'status' => 'Absent'],
        ['date' => '2025-03-03', 'subject' => 'Computer Science', 'status' => 'Present'],
    ],
    'courses' => ['Math', 'Physics', 'Computer Science', 'English'],
    'faculty' => [
        ['name' => 'Dr. Smith', 'subject' => 'Math'],
        ['name' => 'Dr. Johnson', 'subject' => 'Physics'],
        ['name' => 'Prof. Adams', 'subject' => 'Computer Science'],
    ]
];

// Get current route (removing query parameters)
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route Requests
switch ($path) {
    case '/':
    case '/dashboard':
        echo $twig->render('dashboard.twig', $data);
        break;
    case '/attendance':
        echo $twig->render('attendance.twig', $data);
        break;
    case '/courses':
        echo $twig->render('courses.twig', $data);
        break;
    case '/faculty':
        echo $twig->render('faculty.twig', $data);
        break;
    default:
        // 404 Page (if not found)
        http_response_code(404);
        echo $twig->render('layout.twig', ['title' => '404 Not Found', 'menu' => $data['menu']]) . "<h2>Page Not Found</h2>";
        break;
}
?>
