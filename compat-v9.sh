#!/bin/bash

# Double escapes needed
replacements=(
	# Replaces Vendor namespaces to Dependencies
	's|BracketSpace\\Notification\\\(.*\)\\Vendor\\|BracketSpace\\Notification\\\1\\Dependencies\\|g'
	# Replaces Defaults with Repository
	's|BracketSpace\\Notification\\Defaults\\|BracketSpace\\Notification\\Repository\\|g'
	# Replaces settings call
	's|notification_get_setting\(([^)]*)\)|\\Notification::settings\(\)->getSetting\1|g'
	# Replaces common calls from snake case to camel case
	's|->add_action|->addAction|g'
	's|function merge_tags|function mergeTags|g'
	's|->add_merge_tag|->addMergeTag|g'
	's|->add_quick_merge_tag|->addQuickMergeTag|g'
	's|function resolve_merge_tag|function resolveMergeTag|g'
	# Replaces Abstract imports
	's|use BracketSpace\\Notification\\Abstracts;|use BracketSpace\\Notification\\Repository\\Carrier\\BaseCarrier;\nuse BracketSpace\\Notification\\Repository\\Field\\BaseField;\nuse BracketSpace\\Notification\\Repository\\MergeTag\\BaseMergeTag;\nuse BracketSpace\\Notification\\Repository\\Recipient\\BaseRecipient;\nuse BracketSpace\\Notification\\Repository\\Resolver\\BaseResolver;\nuse BracketSpace\\Notification\\Repository\\Trigger\\BaseTrigger;|g'
	# Replaces extends
	's|extends Abstracts\\Carrier|extends BaseCarrier|g'
	's|extends Abstracts\\Field|extends BaseField|g'
	's|extends Abstracts\\MergeTag|extends BaseMergeTag|g'
	's|extends Abstracts\\Recipient|extends BaseRecipient|g'
	's|extends Abstracts\\Resolver|extends BaseResolver|g'
	's|extends Abstracts\\Trigger|extends BaseTrigger|g'
)

sed_script=$(mktemp)

for replacement in "${replacements[@]}"; do
	echo "$replacement" >> "$sed_script"
done

find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) ! -path "./vendor/*" ! -path "./dependencies/*" ! -path "./node_modules/*" -print0 | xargs -0 -I {} sed -i '' -f "$sed_script" {}

rm "$sed_script"
