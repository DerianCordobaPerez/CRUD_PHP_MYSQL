<?php

    class Student {
        public string $name;
        public string $surname;
        public int $age;
        public static int $course;
        
        public function getFullName() {
            return $this->name . ' ' . 
            $this->surname . ' ' . 
            $this->age . ' ' . 
            static::$course;
        }
    }