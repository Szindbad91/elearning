<?php


namespace App\core\Template;


class ModuleRenderer implements Renderable
{
    private string $templateName;
    private ?object $data;

    public function __construct(string $templateName, ?object $data)
    {
        $this->templateName = $templateName;
        $this->templateName = str_replace('App\\', 'src\\', $this->templateName);
        $this->templateName = str_replace('\\', '/', $this->templateName);
        $this->data = $data;
    }

    public function render()
    {

        $template = $this->requireToVar(__DIR__ . '/../../../' . $this->templateName);
        return $template;
    }
    private function requireToVar($file){
        ob_start();
        require($file);
        return ob_get_clean();
    }
}