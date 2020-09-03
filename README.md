# TYPO3 Headless - Content via REST API using t3api

This repository is a proof of concept of outputting TYPO3 content (pages and content elements) via REST API using [t3api extension](https://github.com/sourcebroker/t3api).

**Tested on TYPO3 v9.5 only for now**

## Features of t3apicontent extension

- Registers GET collection and GET item endpoints for pages. It supports page tree, which is limited to 3 levels. Maximum depth can be adjusted in annotation of `\Klamparski\T3apicontent\Domain\Model\Page::pages` property (parameter of `\SourceBroker\T3api\Annotation\Serializer\MaxDepth` annotation).

- Outputs content elements added to the page inside `\Klamparski\T3apicontent\Domain\Model\Page::contentElements` property.

- Uses JMS serializer and TYPO3 discrimination feature to keep separate PHP classes for every type of content element (based on `CType` column). Downside of such solution is that for every type of content element we need configure few places: TYPO3 TCA (`$GLOBALS['TCA']['tt_content']['types']`), Extbase (TypoScript inside `config.tx_extbase.persistence.classes`; see `EXT:t3apicontent/ext_typoscript_setup.txt`), JMS (see `EXT:t3apicontent/Resources/Private/Serializer/Klamparski.T3apicontent/Domain.Model.ContentElement.yml`). From the other side there are big advantages: output only properties which are really used by content element, customize serialization groups and types for specific content elements (for one element `bodytext` should be parsed as RTE and for another it can be plain HTML or text). 

- Outputs `header_link` field of content element as parsed TypoLinks using built-in t3api serialize handler.
 
- Outputs `bodytext` of `textpic` content element as RTE field parsed via TYPO3 build-in parser. It Registers custom serializer handler (`\Klamparski\T3apicontent\Serializer\RteHandler`) utilizing t3api serializer handlers registration (in final solution this should be included in t3api core)
