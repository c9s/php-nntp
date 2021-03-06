<?php

namespace Rvdv\Nntp\Command;

use Rvdv\Nntp\Response\MultiLineResponse;
use Rvdv\Nntp\Response\Response;

/**
 * @author Robin van der Vleuten <robinvdvleuten@gmail.com>
 */
class HelpCommand extends Command implements CommandInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(array(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return 'HELP';
    }

    /**
     * {@inheritdoc}
     */
    public function getExpectedResponseCodes()
    {
        return array(
            Response::HELP_TEXT_FOLLOWS => 'onHelpTextFollow',
        );
    }

    /**
     * Called when help text is received from server.
     *
     * @param MultiLineResponse $response
     */
    public function onHelpTextFollow(MultiLineResponse $response)
    {
        $this->result = implode("\n", (array) $response->getLines());
    }
}
