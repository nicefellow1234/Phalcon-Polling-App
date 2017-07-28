<?php

class PollController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->polls = Polls::find();
    }

    public function loginAction()
    {
        $auth = $this->session->get("auth");
        if ($auth)
        {
            $this->response->redirect("poll");
            $this->view->disable();
        }
        //$this->view->polls = Polls::find();
    }

    public function logoutAction($pollId)
    {
        $this->session->destroy();
        // Forward to the login form again
        if ($pollId) {
        return $this->response->redirect("poll/showoption/$pollId");
        } else {
        return $this->response->redirect("poll/");
        }
    }



    public function addpollAction()
    {
        $auth = $this->session->get("auth");
        if (!$auth) {
        $this->response->redirect("/poll");
        }
        if ($this->request->isPost()) {

            $poll = new Polls();
            $poll->question = $this->request->getPost("question");
            $poll->save();
            return $this->response->redirect("/poll");
        }
    }

    public function editpollAction($pollId)
    {
        $auth = $this->session->get("auth");
        if (!$auth) {
        $this->response->redirect("/poll");
        }
        $poll = new Polls();
        $this->view->poll = $poll->findFirst($pollId);
    }

    public function updatepollAction()
    {
        $auth = $this->session->get("auth");
        if (!$auth) {
        $this->response->redirect("/poll");
        }
        $poll = new Polls();
        $array = $this->request->getPost();
        $data = $poll->findFirst($array['id']);
        $data->assign($array);
        $data->save();
        $this->response->redirect("/poll");
    }

    public function deletepollAction($pollId)
    {

        $poll = new Polls();
        $data = $poll->findFirst($pollId);
        $data->delete();
       /* $options = PollsOptions::find();
        foreach ($options as $singleoption) {
        if ($singleoption->polls_id == $pollId) 
        {
        $option = new PollsOptions();
        $data = $option->findFirst($singleoption->id);
        $data->delete();
        }
        }*/
        $this->response->redirect("/poll");
    }

    public function showoptionAction($pollId)
    {
    	$this->view->poll = Polls::findFirstById($pollId);
    	$this->view->options = PollsOptions::find(array(
    		"polls_id = $pollId",
    		'bind' => array($pollId),
    		'order' => 'number_votes DESC'
    	));
    }

    public function voteoptionAction($optionId)
    {
        if ($optionId == "") {
        $this->response->redirect("/poll");
        } else {
    	$option = PollsOptions::findFirstById($optionId);
        if (!$option) {
        $this->response->redirect("/poll");
        } else {
        $pollId = $option->polls_id;
    	$option->number_votes++;
    	$option->save();
    	return $this->dispatcher->forward(array(
    		'action' => 'showoption' ,
    		'params' => array($option->polls_id)
    	));
        }
        }
    }

    public function addoptionAction($pollId)
    {
        $auth = $this->session->get("auth");
        if (!$auth) {
        if ($pollId == "") {
        $this->response->redirect("/poll");
        } else {
        $this->response->redirect("/poll/showoption/$pollId");
        }
        }
        if ($this->request->isPost()) {

            $option = new PollsOptions();
            $option->polls_id = $pollId;
            $option->name = $this->request->getPost("name");
            $option->number_votes = 0;
            $option->save();

            return $this->dispatcher->forward(array(
            'action' => 'showoption' ,
            'params' => array($option->polls_id)
        ));
        }
    }

    public function deleteoptionAction($optionId)
    {   
        $auth = $this->session->get("auth");
        $option = new PollsOptions();
        $data = $option->findFirst($optionId);
        if (!$data) {
        $this->response->redirect("/poll");
        } else {
        $pollId = $data->polls_id;
        //echo "<pre>".print_r(json_encode($data))."</pre>";
        if (!$auth) {
        if ($optionId == "") {
        $this->response->redirect("/poll");
        } else {
        $this->response->redirect("/poll/showoption/$pollId");
        }
        } else {  
        $data->delete();
        $this->response->redirect("/poll/showoption/$pollId");
        }
        }
    }

    public function editoptionAction($optionId)
    {
        $auth = $this->session->get("auth");
        $option = new PollsOptions();
if (!$auth)
    {
    if ($optionId == "")
        {
        $this->response->redirect("/poll");
        }
      else
        {
        $data = $option->findFirst($optionId);
        if (!$data)
            {
            $this->response->redirect("/poll");
            }
          else
            {
            $pollId = $data->polls_id;
            $this->response->redirect("/poll/showoption/$pollId");
            }
        }
    } else {
    $this->view->option = $option->findFirst($optionId);
    }
    }

    public function updateoptionAction()
    {
        $option = new PollsOptions();
        $array = $this->request->getPost();
        $data = $option->findFirst($array['id']);
        $pollId = $data->polls_id;
        $data->assign($array);
        $data->save();
        $this->response->redirect("/poll/showoption/$pollId");
    }


}

