<?php

namespace kibalanga\core;

class Upload 
{
    private $uploadDir;
    private $profileDir;
    private $productDir;
    private $maxFileSize;
    private $allowedTypes;

    public function __construct($uploadDir = "public/image", $profileDir = "public/profile", $productDir = "public/product", $maxFileSize = 5 * 1024 * 1024, $allowedTypes = ["jpg", "jpeg", "png", "gif"]) {
        $this->uploadDir = rtrim($uploadDir, '/') . '/';
        $this->profileDir = rtrim($profileDir, '/') . '/';
        $this->productDir = rtrim($productDir, '/') . '/';
        $this->maxFileSize = $maxFileSize;
        $this->allowedTypes = $allowedTypes;
        // $this->profileDir = $profileDir;

        // Ensure the upload directory exists
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        if (!is_dir($this->profileDir)) {
            mkdir($this->profileDir, 0777, true);
        }

        if (!is_dir($this->productDir)) {
            mkdir($this->productDir, 0777, true);
        }
    }

    public function image($file) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "File upload error."];
        }

        $fileName = basename($file['name']);
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file size
        if ($fileSize > $this->maxFileSize) {
            return ["success" => false, "message" => "File size exceeds the maximum limit."];
        }

        // Validate file type
        if (!in_array($fileExt, $this->allowedTypes)) {
            return ["success" => false, "message" => "Invalid file type. Allowed types: " . implode(", ", $this->allowedTypes)];
        }

        // Generate unique file name
        $newFileName = uniqid("img_", true) . "." . $fileExt;
        $targetFile = $this->uploadDir . $newFileName;

        // Move file to upload directory
        if (move_uploaded_file($fileTmp, $targetFile)) {
            return ["success" => true, "message" => "File uploaded successfully.", "file_path" => $targetFile];
        } else {
            return ["success" => false, "message" => "Failed to move uploaded file."];
        }
    }

    public function profile($file) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "File upload error."];
        }

        $fileName = basename($file['name']);
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file size
        if ($fileSize > $this->maxFileSize) {
            return ["success" => false, "message" => "File size exceeds the maximum limit."];
        }

        // Validate file type
        if (!in_array($fileExt, $this->allowedTypes)) {
            return ["success" => false, "message" => "Invalid file type. Allowed types: " . implode(", ", $this->allowedTypes)];
        }

        // Generate unique file name
        $newFileName = uniqid("profile_", true) . "." . $fileExt;
        $targetFile = $this->profileDir . $newFileName;

        // Move file to upload directory
        if (move_uploaded_file($fileTmp, $targetFile)) {
            return ["success" => true, "message" => "File uploaded successfully.", "file_path" => $targetFile];
        } else {
            return ["success" => false, "message" => "Failed to move uploaded file."];
        }
    }

    public function product($file) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "File upload error."];
        }

        $fileName = basename($file['name']);
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file size
        if ($fileSize > $this->maxFileSize) {
            return ["success" => false, "message" => "File size exceeds the maximum limit."];
        }

        // Validate file type
        if (!in_array($fileExt, $this->allowedTypes)) {
            return ["success" => false, "message" => "Invalid file type. Allowed types: " . implode(", ", $this->allowedTypes)];
        }

        // Generate unique file name
        $newFileName = uniqid("product_", true) . "." . $fileExt;
        $targetFile = $this->productDir . $newFileName;

        // Move file to upload directory
        if (move_uploaded_file($fileTmp, $targetFile)) {
            return ["success" => true, "message" => "File uploaded successfully.", "file_path" => $targetFile];
        } else {
            return ["success" => false, "message" => "Failed to move uploaded file."];
        }
    }
}
?>
