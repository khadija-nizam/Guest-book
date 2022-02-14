<?php

namespace App\EventSubscriber;

use App\Repository\ConferenceRepository;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{

    private Environment $twig;
    private ConferenceRepository $conferenceRepository;

    /**
     * @param Environment $twig
     * @param ConferenceRepository $conferenceRepository
     */
    public function __construct(Environment $twig, ConferenceRepository $conferenceRepository)
    {
        $this->twig = $twig;
        $this->conferenceRepository = $conferenceRepository;
    }

    public function onControllerEvent(ControllerEvent $event)
    {
        $this->twig->addGlobal('conferences', $this->conferenceRepository->findAll());
    }

    /**
     * @return string[]
     */
    #[ArrayShape([ControllerEvent::class => "string"])] public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
