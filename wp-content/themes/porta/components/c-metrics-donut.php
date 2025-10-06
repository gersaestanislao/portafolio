<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id = get_the_ID();

$metrics_map = [
    'performance'     => [
        'meta_key' => 'performance_score',
        'label'    => __( 'Rendimiento', 'porta' ),
        'color'    => '#f28b20',
    ],
    'accessibility'   => [
        'meta_key' => 'accessibility_score',
        'label'    => __( 'Accesibilidad', 'porta' ),
        'color'    => '#f28b20',
    ],
    'best-practices'  => [
        'meta_key' => 'best_practices_score',
        'label'    => __( 'Recomendaciones', 'porta' ),
        'color'    => '#2ca24c',
    ],
    'seo'             => [
        'meta_key' => 'seo_score',
        'label'    => __( 'SEO', 'porta' ),
        'color'    => '#f28b20',
    ],
];

$metrics_to_render = [];

foreach ( $metrics_map as $metric_id => $metric_data ) {
    $raw_score = get_post_meta( $post_id, $metric_data['meta_key'], true );

    if ( $raw_score === '' ) {
        continue;
    }

    $score = (int) $raw_score;
    $score = max( 0, min( 100, $score ) );

    $metrics_to_render[] = [
        'id'    => $metric_id,
        'label' => $metric_data['label'],
        'score' => $score,
        'color' => $metric_data['color'],
    ];
}

if ( empty( $metrics_to_render ) ) {
    return;
}
?>

<section class="layout-metrics layout-metrics--donut" aria-labelledby="project-metrics-title" data-aos="fade-up">
    <header class="metrics-donut__header">
        <p class="section-label"><?php esc_html_e( 'Auditoría', 'porta' ); ?></p>
        <h2 id="project-metrics-title" class="metrics-donut__title"><?php esc_html_e( 'Resultados Lighthouse', 'porta' ); ?></h2>
        <p class="metrics-donut__description">
            <?php esc_html_e( 'Valores obtenidos en las pruebas de rendimiento, accesibilidad, buenas prácticas y SEO.', 'porta' ); ?>
        </p>
    </header>

    <div class="metrics-donut__grid" role="list">
        <?php foreach ( $metrics_to_render as $metric ) : ?>
            <article
                class="metrics-donut__item"
                role="listitem"
                aria-label="<?php echo esc_attr( sprintf( __( '%s: %d/100', 'porta' ), $metric['label'], $metric['score'] ) ); ?>"
            >
                <div class="metrics-donut__chart" data-score="<?php echo esc_attr( $metric['score'] ); ?>" data-color="<?php echo esc_attr( $metric['color'] ); ?>">
                    <canvas class="js-metric-chart" aria-hidden="true"></canvas>
                    <span class="metrics-donut__value" aria-live="polite"><?php echo esc_html( $metric['score'] ); ?></span>
                </div>
                <p class="metrics-donut__label"><?php echo esc_html( $metric['label'] ); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
