<?php

namespace App\Command;

use App\Repository\ContactRepository;
use App\Services\ContactService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendContactCommand extends Command
{
    private $contactRepository;
    private $mailer;
    private $contactService;
    protected static $defaultName = 'app:send-contact';

    public function __construct(
        ContactRepository $contactRepository,
        MailerInterface $mailer,
        ContactService $contactService,
     ) {
        $this->contactRepository = $contactRepository;
        $this->mailer = $mailer;
        $this->contactService = $contactService;
        parent::__construct(); 
    }

    protected function execute(InputInterface $input, OutputInterface $ouput)
    {
        $toSend = $this->contactRepository->findBy(['isSend' => false]);
        $address = new Address('liliankozlowski36@gmail.com');

        foreach ($toSend as $mail) {
            $mail = (new Email())
                ->from($mail->getEmail())
                ->to($address)
                ->subject('Nouveau message de ' , $mail->getNom())
                ->text($mail->getMessage());

            $this->mailer->send($mail);

            $this->contactService->isSend($mail);
        }

        return Command::SUCCESS;
    }
}

