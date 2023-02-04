<?php
class contactControler extends Controler{
    function runBeforeAction(){
        $dbh=DatabaseConnection::GetInstance();
        $dbc=$dbh->GetConnection();
        echo'inside ContactControler::runBeforeAction <br>';
 
        //var_dump($_SESSION);
     
        if($_SESSION['submited-the-form'] ?? 0==1){
            //$variables['title'] = 'You have already submited the form';
            //$variables['content'] = 'Be patient we will contact you very soon.';

            $pageObj=new Page($dbc);
            $pageObj->FindBy('id',$this->entityId);
            $variables['pageObj']=$pageObj;

            $template = new Template('default');
            $template->view('static-page', $variables);
        }
    }

    function showAction(){
        $dbh=DatabaseConnection::GetInstance();
        $dbc=$dbh->GetConnection();
        echo'inside ContactControler::showAction <br>';
        //$variables['title']='Contact With Us';
       // $variables['content']='Contect with us and give your feedback.';

        $pageObj=new Page($dbc);
        $pageObj->FindBy('id',$this->entityId);
        $variables['pageObj']=$pageObj;

        $template=new Template('default');
        $template->view('Contact',$variables);
    }

    function submitAction(){
        $dbh=DatabaseConnection::GetInstance();
        $dbc=$dbh->GetConnection();
        echo'inside ContactControler::submitAction <br>';
        $_SESSION['submited-the-form']=1;
        //$variables['title']='Thanks You';
        //$variables['content']='We will contact with you soon.';
        $pageObj=new Page($dbc);
        $pageObj->FindBy('id',$this->entityId);
        $variables['pageObj']=$pageObj;

        $template=new Template('default');
        $template->view('static-page',$variables);
    }
}
