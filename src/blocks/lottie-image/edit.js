import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import {
	Placeholder,
	Button,
	Spinner,
	TextControl,
	__experimentalNumberControl as NumberControl,
} from '@wordpress/components';
const { Fragment } = wp.element;
import apiFetch from '@wordpress/api-fetch';
import { useSelect } from '@wordpress/data';
import { useState } from '@wordpress/element';

// new conding style

// editor style
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { content } = attributes;
	return (
		<Fragment>
			<div {...useBlockProps()}>
				lottie image
			</div>
		</Fragment>
	);
}
