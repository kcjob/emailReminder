<?php
  namespace controller;

  use model\db\EmailMessageData;

  class EmailTemplateView {

    private $twig;

    public function __construct()
    {
      $loader = new \Twig_Loader_Filesystem( __DIR__  . '/../templates');
      $this->twig = new \Twig_Environment($loader);
      return  $this-> twig;
    }

    /**
     *
     * @param EmailMessageData $emailDataObject
     * @return string
     */
    public function generateView(EmailMessageData $emailDataObject)
    {

      $templ_var = [];

      $templ_var['userName'] = $emailDataObject->userName;
      $templ_var['userEmailAddress'] = $emailDataObject->userEmailAddress;
      $templ_var['sessionDate'] = $emailDataObject->sessionDate;
      $templ_var['sessionData'] = $emailDataObject->sessionData;
      $templ_var['dataArray'] = $emailDataObject->dataArray;
//print_r($templ_var);
      $objValues = get_object_vars($emailDataObject);
      return $this->twig->render('emailremind.html', $templ_var);
    }

}
