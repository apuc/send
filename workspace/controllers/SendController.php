<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 29.04.19
 * Time: 22:32
 */

namespace workspace\controllers;


use core\Controller;
use core\Debug;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendController extends Controller
{

    public function actionIndex()
    {
        return $this->render('send/index.tpl');
    }

    public function actionSend()
    {
        $json = file_get_contents(ROOT_DIR . '/json/user.json');
        $arr = json_decode($json, true);
//        foreach ($arr as $item) {
//            Debug::prn($item);
//        }
        $res = $this->send([]);
        Debug::prn($res);
        return 'send';
    }

    private function send($user)
    {
        $transport = (new Swift_SmtpTransport('mail.adm.tools', 25))
            ->setUsername('info@behance.space')
            ->setPassword('123edsaqw');

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Новый адрес'))
            ->setFrom(['info@behance.space' => 'Info'])
            ->setTo(['apuc06@mail.ru'])
            ->setBody('Наш новый адрес')
            ->addPart($this->getTpl('send/msg.tpl'), 'text/html');

        $result = $mailer->send($message);

        return $result;
    }

}