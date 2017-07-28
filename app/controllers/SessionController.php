<?php

class SessionController extends ControllerBase
{
    // ...

    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $user->id,
                'username' => $user->username,
            ]
        );
    }

    /**
     * This action authenticate and logs a user into the application
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            // Get the data from the user
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Find the user in the database
            $user = Users::findFirst(
                [
                    "(email = :username: OR username = :username:) AND password = :password:",
                    'bind' => [
                        'username'    => $username,
                        'password' => $password,
                    ]
                ]
            );

            if ($user !== false) {
                $this->_registerSession($user);

                $this->flash->success(
                    'Welcome ' . $user->username
                );

                return $this->response->redirect("poll/");
            }

            $this->flash->error(
                'Wrong username/password'
            );
        }

        // Forward to the login form again
        return $this->dispatcher->forward(
            [
                'controller' => 'poll',
                'action'     => 'login',
            ]
        );
    }
}