<?php


namespace App\core\Module\Controller;


use App\core\Template\ModuleRendererFactory;
use App\core\Template\TemplateEngineFactory;
use App\core\Template\TemplateEngineInterface;

abstract class AbstractController implements ControllerInterface
{
    protected TemplateEngineInterface $templateEngine;
    protected string $className;

    public final function __construct()
    {
        $this->templateEngine = $templateEngine = TemplateEngineFactory::create();
        $this->className = static::class;
    }

    public function render(string $template, ?object $data = null): void
    {
        $moduleNamespace = explode('\Controllers\\', $this->getClassName())[0];
        $moduleRenderer = ModuleRendererFactory::create($moduleNamespace . '\Templates\\' . $template, $data);
        $this->templateEngine->setContainer('module', $moduleRenderer);
    }
    public function setLayout(string $layout): void
    {
        $this->templateEngine->setLayout($layout);
    }
    public function getClassName() {
        return $this->className;
    }
}