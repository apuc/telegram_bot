<?php

namespace kavalar;

use kavalar\exceptions\NoSuchParameterException;
use kavalar\exceptions\NoSuchTemplateException;

/**
 * This class provides string template rendering
 * @author Ivaniv Anton <anton.o.ivaniv@gmail.com>
 *
 */
class BotNotificationTemplateProcessor
{
    protected $templates;

    /**
     * @param array $templates
     * <pre>
     * [
     *   'template_name' => "Hello ~name~"
     * ];
     * </pre>
     *
     */
    public function __construct($templates = [])
    {
        $this->templates = $templates;
    }

    /**
     * @param $template_name string Template Name
     * @param $parameters array Params array
     *
     * <pre>
     * [
     *  'name' => 'Jhon'
     * ]
     * </pre>
     * @throws NoSuchTemplateException
     * @throws NoSuchParameterException
     *
     */
    public function renderTemplate($template_name, $parameters)
    {
        $template = $this->templates[$template_name] ?? '';
        if (empty($template)) {
            throw new NoSuchTemplateException();
        }
        $result = $template;
        preg_match_all("/~.+~/", $result, $matches);

        $matches = $matches[0];
        foreach ($matches as $match) {
            $parameter_name = substr($match, 1, -1);
            if (!isset($parameters[$parameter_name])) {
                throw new NoSuchParameterException();
            }

            $parameter_value = $parameters[$parameter_name];
            $result = str_replace($match, $parameter_value, $result);
        }
        return $result;
    }

    /**
     * @param array $templates
     */
    public function setTemplates(array $templates)
    {
        $this->templates = $templates;
    }

}
