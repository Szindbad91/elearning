<?php


namespace App\core\Template;


class StringReplacerTemplateEnging implements TemplateEngineInterface
{
    /**
     * @var ThemeInterface[]
     */
    private array $themes = [];

    /**
     * @var Renderable[][]
     */
    private array $containers = [];

    private string $layout = 'default';

    private static self $instance;

    public static function getInstance(): TemplateEngineInterface
    {
        if (!isset(self::$instance)) {
            self::$instance = new StringReplacerTemplateEnging();
        }
        return self::$instance;
    }

    public function registerTheme(ThemeInterface $theme): void
    {
        $this->themes[] = $theme;
    }

    // For the simplicity, we will use simple php based templates and render them.
    // If we find a {{ string }} section, we have to replace with the proper container
    // We need to create a container system, where modules can register their own container
    // such as blocks, navigation, etc. In this form our template will have changeable parts.
    public function render(): void
    {
        $theme = array_shift($this->themes);
        $theme->setLayout($this->layout);
        $themeLayout = $theme->getLayoutTemplate();
        foreach ($this->containers as $containerName => $conatainer) {
            $concreteContainer = array_shift($conatainer);
            $themeLayout = str_replace('{{ ' . $containerName . ' }}', $concreteContainer->render(), $themeLayout);
        }
        echo $themeLayout;
    }

    public function setContainer(string $containerName, Renderable $renderable): void
    {
        if (!isset($this->containers[$containerName])) {
            $this->containers[$containerName] = [];
        }
        $this->containers[$containerName][] = $renderable;
    }

    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }
}