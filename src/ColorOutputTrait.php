<?php
/**
 * Created by PhpStorm.
 * User: nhahv
 * Date: 19/11/2015
 * Time: 11:37
 */

namespace NhaHV\CoCoTestCase;

use Illuminate\Contracts\Support\Arrayable;
use Symfony\Component\Console\Helper\Table;

trait ColorOutputTrait
{

    /**
     * Format input to textual table.
     *
     * @param  array   $headers
     * @param  array|\Illuminate\Contracts\Support\Arrayable  $rows
     * @param  string  $style
     * @return void
     */
    public function table(array $headers, $rows, $style = 'default')
    {
        $table = new Table($this->output);

        if ($rows instanceof Arrayable) {
            $rows = $rows->toArray();
        }

        $table->setHeaders($headers)->setRows($rows)->setStyle($style)->render();
    }

    /**
     * Write a string as information output.
     *
     * @param  string  $string
     * @return void
     */
    public function info($string)
    {
        $this->output->writeln("<info>$string</info>");
    }

    /**
     * Write a string as standard output.
     *
     * @param  string  $string
     * @return void
     */
    public function line($string)
    {
        $this->output->writeln($string);
    }

    /**
     * Write a string as comment output.
     *
     * @param  string  $string
     * @return void
     */
    public function comment($string)
    {
        $style = new OutputFormatterStyle('magenta');

        $this->output->getFormatter()->setStyle('comment', $style);
        $this->output->writeln("<comment>$string</comment>");
    }

    /**
     * Write a string as question output.
     *
     * @param  string  $string
     * @return void
     */
    public function question($string)
    {
        $this->output->writeln("<question>$string</question>");
    }

    /**
     * Write a string as error output.
     *
     * @param  string  $string
     * @return void
     */
    public function error($string)
    {
        $this->output->writeln("<error>$string</error>");
    }

    /**
     * Write a string as warning output.
     *
     * @param  string  $string
     * @return void
     */
    public function warn($string)
    {
        $style = new OutputFormatterStyle('black','yellow');

        $this->output->getFormatter()->setStyle('warning', $style);

        $this->output->writeln("<warning>$string</warning>");
    }
}