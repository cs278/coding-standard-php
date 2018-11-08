<?php

namespace Cs278\CsFixer;

use PhpCsFixer\Config;

/**
 * Constructs PHP-CS-Fixer Config object.
 */
final class ConfigBuilder
{
    /** @var \Traversable */
    private $finder;

    /** @var bool */
    private $risky = false;

    public function useFinder(\Traversable $finder): self
    {
        $this->finder = $finder;

        return $this;
    }

    public function useRisky(): self
    {
        $this->risky = true;

        return $this;
    }

    public function build(): Config
    {
        $config = new Config('cs278', 'Chris Smith\'s personal coding standard.');
        $config->setUsingCache(true);
        $config->setRiskyAllowed($this->risky);
        $rules = [
            '@PSR2' => true,
            '@DoctrineAnnotation' => true,
            'align_multiline_comment' => [
                'comment_type' => 'phpdocs_only',
            ],
            'array_indentation' => true,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'backtick_to_shell_exec' => true,
            'binary_operator_spaces' => true,
            'blank_line_after_opening_tag' => true,
            'blank_line_before_statement' => true,
            'cast_spaces' => [
                'space' => 'single',
            ],
            'class_attributes_separation' => [
                'elements' => ['method', 'property'],
            ],
            'compact_nullable_typehint' => true,
            'concat_space' => [
                'spacing' => 'none',
            ],
            'declare_equal_normalize' => [
                'space' => 'none',
            ],

            'escape_implicit_backslashes' => true,
            'explicit_indirect_variable' => true,
            'explicit_string_variable' => true,

            'fully_qualified_strict_types' => true,

            'function_typehint_space' => true,
            'heredoc_to_nowdoc' => true,

            'include' => true,
            'increment_style' => [
                'style' => 'pre',
            ],

            'linebreak_after_opening_tag' => true,
            'list_syntax' => [
                'syntax' => 'long',
            ],

            'lowercase_cast' => true,
            'lowercase_static_reference' => true,
            'magic_constant_casing' => true,
            'magic_method_casing' => true,

            'native_function_casing' => true,

            'new_with_braces' => true,

            'no_binary_string' => true,
            'no_blank_lines_after_class_opening' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_comment' => true,
            'no_empty_phpdoc' => true,
            'no_empty_statement' => true,
            'no_extra_blank_lines' => true,
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_mixed_echo_print' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_null_property_initialization' => true,
            'no_short_bool_cast' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_around_offset' => true,
            'no_superfluous_elseif' => true,
            'no_superfluous_phpdoc_tags' => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unneeded_curly_braces' => true,
            'no_unneeded_final_method' => true,
            'no_unused_imports' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'no_whitespace_before_comma_in_array' => true,
            'no_whitespace_in_blank_line' => true,
            'normalize_index_brace' => true,
            'object_operator_without_whitespace' => true,
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'php_unit_fqcn_annotation' => true,
            'php_unit_method_casing' => [
                'case' => 'camel_case',
            ],
            'php_unit_ordered_covers' => true,

            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => true,
            ],
            'phpdoc_align' => true,
            'phpdoc_indent' => true,
            'phpdoc_inline_tag' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_alias_tag' => true,
            'phpdoc_no_empty_return' => true,
            'phpdoc_no_package' => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_order' => true,
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_summary' => true,
            'phpdoc_trim' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
            ],
            'phpdoc_var_without_name' => true,
            'return_type_declaration' => true,
            'semicolon_after_instruction' => true,
            'short_scalar_cast' => true,
            'simplified_null_return' => true,
            'single_blank_line_before_namespace' => true,
            'single_class_element_per_statement' => true,
            'single_line_comment_style' => true,
            'single_quote' => true,
            'space_after_semicolon' => true,
            'standardize_increment' => true,
            'standardize_not_equals' => true,
            'ternary_operator_spaces' => true,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline_array' => true,
            'trim_array_spaces' => true,
            'unary_operator_spaces' => true,
            'visibility_required' => [
                'elements' => ['property', 'method', 'const'],
            ],

            'whitespace_after_comma_in_array' => true,
        ];

        if ($this->risky) {
            $rules['dir_constant'] = true;
            $rules['error_suppression'] = true;
            $rules['fopen_flag_order'] = true;
            $rules['fopen_flags'] = true;
            $rules['function_to_constant'] = true;
            $rules['implode_call'] = true;
            $rules['is_null'] = [
                'use_yoda_style' => false,
            ];
            $rules['logical_operators'] = true;
            $rules['modernize_types_casting'] = true;
            $rules['native_function_invocation'] = [
                'include' => ['@compiler_optimized'],
            ];
            $rules['no_alias_functions'] = [
                'sets' => ['@all'],
            ];
            $rules['php_unit_set_up_tear_down_visibility'] = true;
            $rules['void_return'] = true;
        }

        // @todo Make these opt-in?
        // $rules['declare_strict_types'] = true;
        // $rules['mb_str_functions'] = true;

        $config->setRules($rules);
        $config->setFinder($this->finder);

        return $config;
    }
}
