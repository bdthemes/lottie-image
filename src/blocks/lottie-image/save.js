import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save();
	return <div {...blockProps}>{attributes.content}</div>;

}
