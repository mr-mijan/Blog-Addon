<?php
class Blog_Widgets_Brayan extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'blog_widget';
	}

	public function get_title()
	{
		return esc_html__('Blog Widget', 'whosbryan');
	}

	public function get_icon()
	{
		return 'eicon-post-list';
	}

	public function get_categories()
	{
		return ['Bryan_Category'];
	}

	public function get_keywords()
	{
		return ['Blog Post', 'Blog'];
	}

	protected function register_controls()
	{
    // Content Section

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'elementor-currency-control'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

    // Post Per Page
    $this->add_responsive_control(
        'bryan_blog_post_per_page',
        [
            'label' => esc_html__( 'Post Per Page', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'default' => 10,
        ]
    );
    // Order
    $this->add_responsive_control(
        'bryan_blog_post_order',
        [
            'label' => esc_html__( 'Order', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
                'desc' => esc_html__( 'DESC', 'whosbryan' ),
                'asc'  => esc_html__( 'ASC', 'whosbryan' ),
            ],
        ]
    );

    // Order By
    $this->add_responsive_control(
        'bryan_blog_post_order_by',
        [
            'label' => esc_html__( 'Orderby', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'date',
            'options' => [
                'date' => esc_html__( 'Date', 'whosbryan' ),
                'id'  => esc_html__( 'ID', 'whosbryan' ),
                'title'  => esc_html__( 'Title', 'whosbryan' ),
                'type'  => esc_html__( 'Type', 'whosbryan' ),
            ],
        ]
    );

        $this->end_controls_section();
    
    // Style Tab
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Year Style', 'whosbryan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    // Year Style
    $this->add_responsive_control(
        'year_text_color',
        [
            'label' => esc_html__( 'Text Color', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-year' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year_content_typography',
            'selector' => '{{WRAPPER}} .blog-year',
        ]
    );

    $this->end_controls_section();

    // Style Tab
    $this->start_controls_section(
        'month_style_section',
        [
            'label' => esc_html__( 'Month Style', 'whosbryan' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    // Year Style
    $this->add_responsive_control(
        'month_text_color',
        [
            'label' => esc_html__( 'Text Color', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-month' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'month_content_typography',
            'selector' => '{{WRAPPER}} .blog-month',
        ]
    );

    $this->end_controls_section();

    // Style Tab
    $this->start_controls_section(
        'blog_content_style_section',
        [
            'label' => esc_html__( 'Blog Contnet Style', 'whosbryan' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_responsive_control(
        'date_heading',
        [
            'label' => esc_html__( 'Date Style', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'after',
        ]
    );

    $this->add_responsive_control(
        'blog_content_date_color',
        [
            'label' => esc_html__( 'Text Color', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-post-entry .date' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'blog_date_content_typography',
            'selector' => '{{WRAPPER}} .custom-post-entry .date',
        ]
    );

    $this->add_responsive_control(
        'title_heading',
        [
            'label' => esc_html__( 'Title Style', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'after',
        ]
    );
    // Blog Content Style
    $this->add_responsive_control(
        'blog_content_title_color',
        [
            'label' => esc_html__( 'Title Color', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .title-wrap a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'blog_content_title_hover_color',
        [
            'label' => esc_html__( 'Hover Color', 'whosbryan' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .title-wrap a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'blog_title_content_typography',
            'selector' => '{{WRAPPER}} .title-wrap a',
        ]
    );

    $this->end_controls_section();

        
    }


	protected function render(){
    $settings = $this->get_settings_for_display();
    $bryan_blog_post_per_page =$settings ['bryan_blog_post_per_page'];
    $bryan_blog_post_order =$settings ['bryan_blog_post_order'];
    $bryan_blog_post_order_by =$settings ['bryan_blog_post_order_by'];

    // Custom query to get posts organized by year and month
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => $bryan_blog_post_per_page, // Number of posts per page
        'paged'          => $paged,
        'orderby'        => $bryan_blog_post_order_by,
        'order'          => $bryan_blog_post_order,
    );

    $custom_query = new WP_Query($args);

    // Initialize variables to track current year and month
    $current_year  = '';
    $current_month = '';

    // Start the loop
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            // Get post date
            $post_date = get_the_date('F Y');

            // Display year and month headings
            if ($post_date !== $current_month) :
                // Display year heading if it's a new year
                
                if (get_the_date('Y') !== $current_year) :
                    echo '<h2 class="blog-year">' . get_the_date('Y') . '</h2>';
                    $current_year = get_the_date('Y');
                endif;

                // Display month heading
                echo '<h3 class="blog-month">' . get_the_date('F') . '</h3>';
                $current_month = $post_date;
            endif;

            // Display post content
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">

                <div class="entry">
                    <div class="custom-post-entry">
                        <span class="date"><?php echo get_the_date(); ?></span>
                            <div class="title-wrap"><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                </header>
            </article>
            <?php
        endwhile;

        // Display pagination links
        echo '<div class="blog_pagination_links">';
        echo paginate_links(array(
            'total'     => $custom_query->max_num_pages,
            'current'   => max(1, get_query_var('paged')),
            'prev_text' => __('&laquo; Previous'),
            'next_text' => __('Next &raquo;'),
        ));
        echo '</div>';

        wp_reset_postdata(); // Reset post data to the main query
    else :
        echo '<p>No posts found</p>';
    endif;

    ?>


    <?php
	}
}
   
   
   
   
   
