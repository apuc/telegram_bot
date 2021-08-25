<?php

namespace kavalar;

use kavalar\exceptions\NoSuchAttributeException;
use kavalar\exceptions\NoSuchTemplateException;

class BotNotificationTemplateProcessor
{
    protected $templates;

    /**
     * @param array $templates
     * <pre>
     * <i>Template array format</i>
     * [
     *   'template_name' => "Hello ~name~"
     * ];
     *
     * </pre>
     * There is default param value.<br>
     * Default template seek in <i>'/src/default_templates.php'</i>
     *
     */
    public function __construct($templates = [])
    {
        if (empty($templates)) {
            $templates = require_once __DIR__ . '/default_templates.php';
        }
        $this->templates = $templates;
    }

    /**
     * @param $template_name string Template Name
     * @param $parameters array Params array
     *
     * <pre>
     * <i>Example</i>
     * [
     *  'name' => 'Jhon'
     * ]
     * </pre>
     * @throws NoSuchTemplateException
     * @throws NoSuchAttributeException
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
                throw new NoSuchAttributeException();
            }

            $parameter_value = $parameters[$parameter_name];
            $result = str_replace($match, $parameter_value, $result);
        }
        return $result;
    }


}
