<?php 

namespace elementor;




// Slider

class compare_product extends Widget_Base {

  public function get_name(){

    return "compare_product";
  }

  public function get_title(){
    return "Product Compare";
  }

  public function get_icon() {

    return "fa fa-compress";
  }

  public function get_categories() {
    return [ 'basic' ];
  }


  protected function _register_controls() {

  $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 's_themeey' ),
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'list_sku', [
        'label' => __( 'SKU', 's_themeey' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'Chapin 63985' , 's_themeey' ),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'list_image',
      [
        'label' => __( 'Choose Image', 'plugin-domain' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $repeater->add_control(
      'list_description',
      [
        'label' => __( 'Description', 's_themeey' ),
        'type' => Controls_Manager::TEXTAREA,
      ]
    );

    $repeater->add_control(
      'list_button_text',
      [
        'label' => __( 'Price Button Text', 's_themeey' ),
        'type' => Controls_Manager::BUTTON,
        'text' => __( 'Check Price', 's_themeey' ),
      ]
    );

    $repeater->add_control(
      'list_button_url',
      [
        'label' => __( 'Price Button URL', 's_themeey' ),
        'type' => Controls_Manager::URL,
        'placeholder' => '#'
      ]
    );


    $repeater->add_control(
      'list_weight',
      [
        'label' => __( 'Weight', 's_themeey' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '11 ibs' , 's_themeey' ),
      ]
    );

    $repeater->add_control(
      'list_editing_rating',
      [
        'label' => __( 'Rating', 's_themeey' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '4.9' , 's_themeey' ),
      ]
    );


    $this->add_control(
      'product_list',
      [
        'label' => __( 'Repeat', 's_themeey' ),
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_title' => __( 'Title #1', 's_themeey' ),
            'list_content' => __( '' ),
          ],
        ]
      ]
    );

    $this->end_controls_section();

  }


  protected function render() {
    $settings = $this->get_settings_for_display();

    if ( $settings['product_list'] ) {

    ?>
    <table id="product-compare">
      <thead>
        <tr>
          <th>Model</th>
          <th>Price</th>
          <th>Weight</th>
          <th>Editor</th>
        </tr>    
      </thead>
      <tbody>

        <?php foreach ($settings['product_list'] as $value) { ?>
        <tr>
          <td>
            <p>
              <?php echo $value['list_sku']; ?>
            </p>
            <img src="<?php echo $value['list_image']['url']; ?>">
            <p><strong><?php echo $value['list_description']; ?></strong></p>
            </td>
          <td><a href="<?php echo $value['list_button_url']['url']; ?>">Check Price</a></td>
          <td><?php echo $value['list_weight']; ?></td>
          <td><?php echo $value['list_editing_rating']; ?>/5</td>
        </tr> 
        <?php } ?>

      </tbody>
    </table>

    <?php 

    }

  }

}


Plugin::instance()->widgets_manager->register_widget_type( new compare_product );
