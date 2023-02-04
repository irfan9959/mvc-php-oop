<?php
class Controler{
    protected $entityId;
    function runAction($actionName){
        $dbh=DatabaseConnection::GetInstance();
        $dbc=$dbh->GetConnection();
        echo'inside Controler::runAction <br>';
        $runBeforeAction='runBeforeAction';
        if(method_exists($this,$runBeforeAction)){
            $this->$runBeforeAction();
        }
        $actionName.='Action';
        if(method_exists($this,$actionName)){
            $this->$actionName();
        } 
        else{
            //$variables['title'] = 'Page Not Found';
            //$variables['content'] = 'This page does not Exist.';
            $pageObje=new Page($dbc);
            $pageObje->FindBy('id',$this->entityId);
            $variables['pageObj']=$pageObje;
            $template = new Template('default');
            $template->view('static-page', $variables);
        }
    }
    public function setEntityId($entityId){
        $this->entityId=$entityId;
    }

    //just to learn git
}
?>