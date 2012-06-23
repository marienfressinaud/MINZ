<?php
# ***** BEGIN LICENSE BLOCK *****
# MINZ - a free PHP Framework like Zend Framework
# Copyright (C) 2011 Marien Fressinaud
# 
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
# 
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
# ***** END LICENSE BLOCK *****

/**
 * La classe FrontController est le noyau du framework, elle lance l'application
 * Elle est appelée en général dans le fichier index.php à la racine du serveur
 */
class FrontController {
	protected $dispatcher;
	protected $router;
	
	/**
	 * Constructeur
	 */
	public function __construct () {
		$this->loadLib ();
		
		try {
			Configuration::init ();
			Request::init ();
			
			$this->router = new Router ();
			$this->router->init ();
		
			$this->dispatcher = Dispatcher::getInstance ($this->router);
		} catch (MinzException $e) {
			Log::record ($e->getMessage (), Log::ERROR);
			$this->killApp ();
		}
	}
	
	/**
	 * Inclue les fichiers de la librairie
	 */
	private function loadLib () {
		require ('ActionController.php');
		require ('Configuration.php');
		require ('Dispatcher.php');
		require ('Log.php');
		require ('Request.php');
		require ('Response.php');
		require ('Router.php');
		require ('Session.php');
		require ('Translate.php');
		require ('Url.php');
		require ('View.php');
		
		require ('exceptions/MinzException.php');
	}
	
	/**
	 * Initialise le FrontController
	 */
	public function init () { }
	
	/**
	 * Démarre l'application
	 */
	public function run () {
		try {
			$this->dispatcher->run ();
			Response::send ();
		} catch (MinzException $e) {
			Log::record ($e->getMessage (), Log::ERROR);
			$this->killApp ();
		}
	}
	
	/**
	* Permet d'arrêter le programme en urgence
	*/
	private function killApp () {
		exit ('### Application problem ###'."\n".
		      'See logs files');
	}
}
