<?php

namespace FelixNagel\T3extblog\Dashboard\Provider;

/**
 * This file is part of the "t3extblog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;

class ModuleButtonProvider implements ButtonProviderInterface
{
    use ProviderTrait;

    private string $title;

    private string $target;

    private array $linkArguments = [];

    public function __construct(string $title, array $linkArguments, string $target = '')
    {
        $this->title = $title;
        // @extensionScannerIgnoreLine
        $this->target = $target;
        $this->linkArguments = $linkArguments;
    }

    
    protected function getModuleLink(int $id = null, array $arguments = []): string
    {
        $parameters = [];
        $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);

        if ($id === null) {
            $pages = $this->getBlogPageUids();

            if (count($pages) === 1) {
                $id = (int)current($pages);
            }
        }

        if (is_int($id)) {
            $parameters['id'] = $id;
        }

        if ($arguments !== []) {
            $parameters['tx_t3extblog_web_t3extblogtxt3extblog'] = $arguments;
        }

        return (string)$uriBuilder->buildUriFromRoute('web_T3extblogTxT3extblog', $parameters);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        return $this->getModuleLink(null, $this->linkArguments);
    }

    public function getTarget(): string
    {
        return $this->target;
    }
}
