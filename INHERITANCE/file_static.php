<?php
class File {
    public $name;
    public $size;

    public function __construct($name, $size) {
        $this->name = $name;
        $this->size = $size;
    }

    public static function calculateTotalSize($files) {
        $totalSize = 0;
        foreach ($files as $file) {
            $totalSize += $file->size;
        }
        return $totalSize;
    }
}

// Example Usage
$file1 = new File("File1", 500);
$file2 = new File("File2", 300);
$files = [$file1, $file2];
echo "Total Size: " . File::calculateTotalSize($files) . " KB\n";
?>
