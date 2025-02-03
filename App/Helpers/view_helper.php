<?php
if(!function_exists('view')) {
    function view(string $viewPath, array $data = [])
    {
        // Convert dot notation to directory separators
        $viewFile = "../app/Views/" . str_replace('.', '/', $viewPath) . ".php";
        // Check if the view file exists
        if(!file_exists($viewFile)) {
            throw new \Exception("View file not found: $viewFile");
        }
        // Extract data for use in the view
        extract($data);
        // Include the view file
        require $viewFile;
    }
}