<?php

namespace Rvdv\Nntp;

use Rvdv\Nntp\Command\CommandInterface;
use Rvdv\Nntp\Response\ResponseInterface;

/**
 * @author Robin van der Vleuten <robinvdvleuten@gmail.com>
 */
interface ClientInterface
{
    /**
     * Establish a connection with the NNTP server.
     *
     * @return ResponseInterface
     */
    public function connect();

    /**
     * Disconnect the connection with the NNTP server.
     *
     * @return boolean A boolean indicating if the connection is disconnected.
     */
    public function disconnect();

    /**
     * Authenticate with the given username/password.
     *
     * @param string      $username
     * @param string|null $password
     *
     * @return ResponseInterface
     */
    public function authenticate($username, $password = null);

    /**
     * Connect and optionally authenticate with the NNTP server if
     * a username and/or password are given.
     *
     * @param string|null $username
     * @param string|null $password
     *
     * @return ResponseInterface
     */
    public function connectAndAuthenticate($username = null, $password = null);

    /**
     * Send the AUTHINFO command.
     *
     * @param $type
     * @param $value
     *
     * @return \Rvdv\Nntp\Command\AuthInfoCommand
     */
    public function authInfo($type, $value);

    /**
     * Send the HELP command.
     *
     * @return \Rvdv\Nntp\Command\HelpCommand
     */
    public function help();

    /**
     * Send the GROUP command.
     *
     * @param $name
     *
     * @return \Rvdv\Nntp\Command\GroupCommand
     */
    public function group($name);

    /**
     * Send the LIST OVERVIEW.FMT command.
     *
     * @return \Rvdv\Nntp\Command\OverviewFormatCommand
     */
    public function overviewFormat();

    /**
     * Send the QUIT command.
     *
     * @return \Rvdv\Nntp\Command\QuitCommand
     */
    public function quit();

    /**
     * Send the XFEATURE command.
     *
     * @param $feature
     *
     * @return \Rvdv\Nntp\Command\XFeatureCommand
     */
    public function xfeature($feature);

    /**
     * Send the XOVER command.
     *
     * @param $from
     * @param $to
     * @param array $format
     *
     * @return \Rvdv\Nntp\Command\XoverCommand
     */
    public function xover($from, $to, array $format);

    /**
     * Send the XZVER command.
     *
     * @param $from
     * @param $to
     * @param array $format
     *
     * @return \Rvdv\Nntp\Command\XzverCommand
     */
    public function xzver($from, $to, array $format);

    /**
     * Send the given command to the NNTP server.
     *
     * @param CommandInterface $command
     *
     * @return CommandInterface
     */
    public function sendCommand(CommandInterface $command);
}
