<?php 

namespace InterfaceLoader;

interface InterfaceLoader{

	public function getClasses();

	public function getLibrary();

	public function loadClasses();

	public function loadClass($class);

	public function isClassLoad($class);
}