<?php
class PageControler extends Controler{
    function showAction(){
        $dbh=DatabaseConnection::GetInstance();
        $dbc=$dbh->GetConnection();
        echo'inside AboutUsControler::showAction <br>';
        //$variables['title']='About Us';
        //$variables['content']='This is our CMS project that is very good to process applications';
        $pageObj=new Page($dbc);
        $pageObj->FindBy('id',$this->entityId);
        $variables['pageObj']=$pageObj;

        $template=new Template('default');
        $template->view('static-page',$variables);
    }
    
}