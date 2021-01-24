#!/usr/bin/env php

<?php

/*
 * To update email providers from the command line run:
 * $ ./update-email-providers.php
 */

$EmailProvidersLocation = 'https://gist.githubusercontent.com/tbrianjones/5992856/raw/93213efb652749e226e69884d6c048e595c1280a/free_email_provider_domains.txt';

$EmailProviders = file_get_contents($EmailProvidersLocation);

if (!is_string($EmailProviders)) { die('Failed to fetch datas'); }

$EmailProviders = preg_split('/\r\n|\r|\n/', $EmailProviders);
array_shift($EmailProviders);

if (!is_array($EmailProviders)) { die('Unable to parse datas'); }

$exportedArray = '[' . PHP_EOL;

foreach ($EmailProviders as $domain) {
    if (! empty($domain)) {
        $domain = strtolower($domain);
        $exportedArray .= "    '{$domain}'," . PHP_EOL;
    }
}

$exportedArray .= ']';

$phpFileTemplate = <<<TEMPLATE
<?php

/**
 * @see https://gist.github.com/tbrianjones/5992856
 */
 
return {$exportedArray};
 
TEMPLATE;

$writeToFile = file_put_contents('../src/data/email-providers.php', $phpFileTemplate);

if (!$writeToFile) { die('Failed to write to file'); }

echo "Successfully Fetched Email Providers";
exit();
