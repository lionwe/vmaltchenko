<?php
/**
 * Custom Post Types Registration
 *
 * Project: Dr. Vmaltchenko
 * Registered CPTs:
 * 1. Services (Послуги) -> Items: Service (Послуга)
 *    - Custom Taxonomy: service_category (Категорії послуг)
 *    - Custom Taxonomy: service_tag (Теги послуг)
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register Custom Taxonomies for Services
 */
function dr_vmaltchenko_register_taxonomies()
{
    // ============================================
    // Service Categories (Категорії послуг)
    // ============================================
    $labels_service_category = array(
        'name' => _x('Категорії послуг', 'Taxonomy General Name', 'dr-vmaltchenko'),
        'singular_name' => _x('Категорія послуги', 'Taxonomy Singular Name', 'dr-vmaltchenko'),
        'menu_name' => __('Категорії', 'dr-vmaltchenko'),
        'all_items' => __('Всі категорії', 'dr-vmaltchenko'),
        'parent_item' => __('Батьківська категорія', 'dr-vmaltchenko'),
        'parent_item_colon' => __('Батьківська категорія:', 'dr-vmaltchenko'),
        'new_item_name' => __('Нова категорія', 'dr-vmaltchenko'),
        'add_new_item' => __('Додати категорію', 'dr-vmaltchenko'),
        'edit_item' => __('Редагувати категорію', 'dr-vmaltchenko'),
        'update_item' => __('Оновити категорію', 'dr-vmaltchenko'),
        'view_item' => __('Переглянути категорію', 'dr-vmaltchenko'),
        'search_items' => __('Пошук категорій', 'dr-vmaltchenko'),
        'not_found' => __('Категорій не знайдено', 'dr-vmaltchenko'),
    );

    $args_service_category = array(
        'labels' => $labels_service_category,
        'hierarchical' => true, // Like categories
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'rewrite' => array('slug' => 'service-category', 'with_front' => false),
        'show_in_rest' => false,
    );

    register_taxonomy('service_category', array('services'), $args_service_category);

    // ============================================
    // Service Tags (Теги послуг)
    // ============================================
    $labels_service_tag = array(
        'name' => _x('Теги послуг', 'Taxonomy General Name', 'dr-vmaltchenko'),
        'singular_name' => _x('Тег послуги', 'Taxonomy Singular Name', 'dr-vmaltchenko'),
        'menu_name' => __('Теги', 'dr-vmaltchenko'),
        'all_items' => __('Всі теги', 'dr-vmaltchenko'),
        'new_item_name' => __('Новий тег', 'dr-vmaltchenko'),
        'add_new_item' => __('Додати тег', 'dr-vmaltchenko'),
        'edit_item' => __('Редагувати тег', 'dr-vmaltchenko'),
        'update_item' => __('Оновити тег', 'dr-vmaltchenko'),
        'view_item' => __('Переглянути тег', 'dr-vmaltchenko'),
        'search_items' => __('Пошук тегів', 'dr-vmaltchenko'),
        'not_found' => __('Тегів не знайдено', 'dr-vmaltchenko'),
        'popular_items' => __('Популярні теги', 'dr-vmaltchenko'),
    );

    $args_service_tag = array(
        'labels' => $labels_service_tag,
        'hierarchical' => false, // Like tags
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'service-tag', 'with_front' => false),
        'show_in_rest' => false,
    );

    register_taxonomy('service_tag', array('services'), $args_service_tag);
}

add_action('init', 'dr_vmaltchenko_register_taxonomies', 0);

/**
 * Register all Custom Post Types
 */
function dr_vmaltchenko_register_cpts()
{
    // ============================================
    // 1. Services (Послуги)
    // ============================================
    $labels_services = array(
        'name' => _x('Послуги', 'Post Type General Name', 'dr-vmaltchenko'),
        'singular_name' => _x('Послуга', 'Post Type Singular Name', 'dr-vmaltchenko'),
        'menu_name' => __('Послуги', 'dr-vmaltchenko'),
        'name_admin_bar' => __('Послуга', 'dr-vmaltchenko'),
        'add_new' => __('Додати', 'dr-vmaltchenko'),
        'add_new_item' => __('Додати нову послугу', 'dr-vmaltchenko'),
        'new_item' => __('Нова послуга', 'dr-vmaltchenko'),
        'edit_item' => __('Редагувати послугу', 'dr-vmaltchenko'),
        'view_item' => __('Переглянути послугу', 'dr-vmaltchenko'),
        'all_items' => __('Всі послуги', 'dr-vmaltchenko'),
        'search_items' => __('Пошук послуг', 'dr-vmaltchenko'),
        'not_found' => __('Послуг не знайдено', 'dr-vmaltchenko'),
        'not_found_in_trash' => __('Послуг не знайдено у кошику', 'dr-vmaltchenko'),
        'featured_image' => __('Зображення послуги', 'dr-vmaltchenko'),
        'set_featured_image' => __('Встановити зображення', 'dr-vmaltchenko'),
        'remove_featured_image' => __('Видалити зображення', 'dr-vmaltchenko'),
        'archives' => __('Архів послуг', 'dr-vmaltchenko'),
    );

    $args_services = array(
        'label' => __('Послуги', 'dr-vmaltchenko'),
        'description' => __('Медичні послуги центру', 'dr-vmaltchenko'),
        'labels' => $labels_services,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'taxonomies' => array('service_category', 'service_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-heart',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'services', 'with_front' => false),
        'show_in_rest' => false, // Classic Editor / ACF
    );

    register_post_type('services', $args_services);
}

add_action('init', 'dr_vmaltchenko_register_cpts');

/**
 * Flush rewrite rules on theme switch
 */
add_action('after_switch_theme', function () {
    dr_vmaltchenko_register_taxonomies();
    dr_vmaltchenko_register_cpts();
    flush_rewrite_rules();
});
