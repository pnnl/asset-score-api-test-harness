<?php

class Settings {
  private static $instance = null;
  private $settings = array();
  private $settings_filename = 'settings';

  private function __construct() {
    $this->loadSettings();
  }

  private function loadSettings() {
    if(file_exists($this->settings_filename)) {
      $this->settings = file_get_contents($this->settings_filename);

      if(!$this->settings) {
        exit(1);
      }

      $this->settings = json_decode($this->settings, true);
    }
  }

  private function saveSettings() {
    file_put_contents($this->settings_filename, json_encode($this->settings));
  }

  public static function getInstance() {
    if(static::$instance == null) {
      static::$instance = new Settings();
    }

    return static::$instance;
  }

  public function updateSetting($setting, $value) {
    $this->settings[$setting] = $value;
    $this->saveSettings();
  }

  public function getSetting($setting) {
    if(isset($this->settings[$setting])) {
      return $this->settings[$setting];
    }

    return '';
  }

}
