#!/usr/bin/env php

<?php

/*
 * To update role based email prefixes from the command line run:
 * $ ./update-email-prefixes.php
 */

$roleBasedEmailPrefixesLocation = 'https://raw.githubusercontent.com/pet2166054/role-based-email-addresses/master/index.json';

$roleBasedEmailPrefixesJson = file_get_contents($roleBasedEmailPrefixesLocation);

if (!is_string($roleBasedEmailPrefixesJson)) { die('Failed to fetch datas'); }

$roleBasedEmailPrefixes = json_decode($roleBasedEmailPrefixesJson, true);

if (!is_array($roleBasedEmailPrefixes)) { die('Unable to decode JSON'); }

$exportedArray = '[' . PHP_EOL;

foreach ($roleBasedEmailPrefixes as $domain) {
    if (! empty($domain)) {
        $domain = strtolower($domain);
        $exportedArray .= "    '{$domain}'," . PHP_EOL;
    }
}

$exportedArray .= ']';

$phpFileTemplate = <<<TEMPLATE
<?php

/**
 * This data is autogenerated. 
 *
 * @see https://github.com/mixmaxhq/role-based-email-addresses
 * @see http://kb.mailchimp.com/lists/growth/limits-on-role-based-addresses
 */
 
 return {$exportedArray};
 
TEMPLATE;

$writeToFile = file_put_contents('../src/data/role-based-email-prefixes.php', $phpFileTemplate);

if (!$writeToFile) { die('Failed to write to file'); }

echo "Successfully Fetched role based email prefixes";
exit();