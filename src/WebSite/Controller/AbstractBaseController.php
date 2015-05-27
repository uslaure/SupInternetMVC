<?php
	namespace Controller;

	use Symfony\Component\Yaml\Parser;

	class AbstractBaseController{
		public function getConnection(){
			$config = new \Doctrine\DBAL\Configuration();
            //for this array use config_dev.yml and YamlComponents
            // http://symfony.com/fr/doc/current/components/yaml/introduction.html

			$parser = new Parser();
            $parameterFile = file_get_contents(__DIR__.'/../../app/config/config_dev.yml');
			$parameters = $parser->parse($parameterFile);

            return \Doctrine\DBAL\DriverManager::getConnection($parameters['doctrine'], $config);
		}
	}

	function addMessageFlash($type, $message)
{
    // autorise que 4 types de messages flash
    $types = ['success','error','alert','info'];
    if (!in_array($type, $types)) {
        return false;
    }

    // on vérifie que le type existe
    if (!isset($_SESSION['flashBag'][$type])) {
        //si non on le créé avec un Array vide
        $_SESSION['flashBag'][$type] = [];
// on ajoute le message
    $_SESSION['flashBag'][$type][] = $message;

}