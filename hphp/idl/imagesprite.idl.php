<?php
/**
 * Automatically generated by running "php schema.php imagesprite".
 *
 * You may modify the file, but re-running schema.php against this file will
 * standardize the format without losing your schema changes. It does lose
 * any changes that are not part of schema. Use "note" field to comment on
 * schema itself, and "note" fields are not used in any code generation but
 * only staying within this file.
 */
///////////////////////////////////////////////////////////////////////////////
// Preamble: C++ code inserted at beginning of ext_{name}.h

DefinePreamble(<<<CPP
#include <gd.h>
#include <runtime/ext/ext_imagesprite_include.h>

CPP
);

///////////////////////////////////////////////////////////////////////////////
// Constants
//
// array (
//   'name' => name of the constant
//   'type' => type of the constant
//   'note' => additional note about this constant's schema
// )


///////////////////////////////////////////////////////////////////////////////
// Functions
//
// array (
//   'name'   => name of the function
//   'desc'   => description of the function's purpose
//   'flags'  => attributes of the function, see base.php for possible values
//   'opt'    => optimization callback function's name for compiler
//   'note'   => additional note about this function's schema
//   'return' =>
//      array (
//        'type'  => return type, use Reference for ref return
//        'desc'  => description of the return value
//      )
//   'args'   => arguments
//      array (
//        'name'  => name of the argument
//        'type'  => type of the argument, use Reference for output parameter
//        'value' => default value of the argument
//        'desc'  => description of the argument
//      )
// )


///////////////////////////////////////////////////////////////////////////////
// Classes
//
// BeginClass
// array (
//   'name'   => name of the class
//   'desc'   => description of the class's purpose
//   'flags'  => attributes of the class, see base.php for possible values
//   'note'   => additional note about this class's schema
//   'parent' => parent class name, if any
//   'ifaces' => array of interfaces tihs class implements
//   'bases'  => extra internal and special base classes this class requires
//   'footer' => extra C++ inserted at end of class declaration
// )
//
// DefineConstant(..)
// DefineConstant(..)
// ...
// DefineFunction(..)
// DefineFunction(..)
// ...
// DefineProperty
// DefineProperty
//
// array (
//   'name'  => name of the property
//   'type'  => type of the property
//   'flags' => attributes of the property
//   'desc'  => description of the property
//   'note'  => additional note about this property's schema
// )
//
// EndClass()

///////////////////////////////////////////////////////////////////////////////

BeginClass(
  array(
    'name'   => "ImageSprite",
    'bases'  => array('Sweepable'),
    'desc'   => "Represents a set of images sprited into a single image.",
    'flags'  =>  HasDocComment,
    'footer' => <<<EOT

 private:
  void map();

 public:
  hphp_string_map<ImageSprite::ResourceGroup*> m_rsrc_groups;
  String m_image_string_buffer;
  bool m_current;
  hphp_string_map<ImageSprite::Image*> m_image_data;
  Array m_mapping;
  Array m_img_errors;
  Array m_sprite_errors;
  gdImagePtr m_image;
  int m_width;
  int m_height;
EOT
,
  ));

DefineFunction(
  array(
    'name'   => "__construct",
    'desc'   => "Creates a new ImageSprite object",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => null,
      'desc'   => "TODO",
    ),
  ));

DefineFunction(
  array(
    'name'   => "addFile",
    'desc'   => "Adds the image specified by the file path to the sprite.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "file",
        'type'   => String,
        'desc'   => "The path to the image. Must be a path to the local filesystem or a a stream format php supports.",
      ),
      array(
        'name'   => "options",
        'type'   => StringMap,
        'value'  => "null",
        'desc'   => "Associative array of options for this image. May include the image's 'width' and 'height' (if previously known to the developer), or spacing requirements via the padding_DIRECTION keys, where DIRECTION may be top, bottom, left, or right.  May also include flush requirements that will force this image to be 'flush_left' or 'flush_right' within the sprite.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "addString",
    'desc'   => "Adds the image defined by the string to the sprite.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "id",
        'type'   => String,
        'desc'   => "An identifier for this image. This will be the key to referencing this image in the mapping.",
      ),
      array(
        'name'   => "data",
        'type'   => String,
        'desc'   => "The data of this image.",
      ),
      array(
        'name'   => "options",
        'type'   => StringMap,
        'value'  => "null",
        'desc'   => "Associative array of options for this image. May include the image's 'width' and 'height' (if previously known to the developer), or spacing requirements via the padding_DIRECTION keys, where DIRECTION may be top, bottom, left, or right.  May also include flush requirements that will force this image to be 'flush_left' or 'flush_right' within the sprite.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "addUrl",
    'desc'   => "Adds the image located at the specified URL to the sprite.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The url of the image. The URL must be using the http protocol; secure connections are not supported.",
      ),
      array(
        'name'   => "timeout_ms",
        'type'   => Int32,
        'value'  => "0",
        'desc'   => "The timeout in milliseconds for this request. A value of 0 or lower will disable the timeout.",
      ),
      array(
        'name'   => "Options",
        'type'   => StringMap,
        'value'  => "null",
        'desc'   => "Associative array of options for this image. May include the image's 'width' and 'height' (if previously known to the developer), or spacing requirements via the padding_DIRECTION keys, where DIRECTION may be top, bottom, left, or right.  May also include flush requirements that will force this image to be 'flush_left' or 'flush_right' within the sprite.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "clear",
    'desc'   => "Removes images from the sprite and frees the memory associated with that image.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "paths",
        'type'   => Variant,
        'value'  => "null",
        'desc'   => "When passed a string, it will remove the images specified by that path or identifier from the sprite, if they exist. You may also pass an array of strings, and it will remove each.  a null value will remove all images from the sprite.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "loadDims",
    'desc'   => "Loads the dimensions for the images in the sprite, but not necessarily their data.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "block",
        'type'   => Boolean,
        'value'  => "false",
        'desc'   => "Whether this call should block until all the data is loaded or allow them to load in the background.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "loadImages",
    'desc'   => "Loads the images in the sprite and sets the correct dimensions.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Object,
      'desc'   => "The ImageSprite object itself (for method chaining).",
    ),
    'args'   => array(
      array(
        'name'   => "block",
        'type'   => Boolean,
        'value'  => "false",
        'desc'   => "Whether this call should block until all the data is loaded or allow them to load in the background.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "output",
    'desc'   => "Retrieves the resulting sprite image.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => String,
      'desc'   => "The image data, if the \$output_file is not specified.",
    ),
    'args'   => array(
      array(
        'name'   => "output_file",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "Path to where the output image should be saved. If empty or null, the image data is returned as a string.",
      ),
      array(
        'name'   => "format",
        'type'   => String,
        'value'  => "\"png\"",
        'desc'   => "The format the output image should be returned in. Defaults to png.",
      ),
      array(
        'name'   => "quality",
        'type'   => Int32,
        'value'  => "75",
        'desc'   => "The output quality of the image. Only applies to jpeg output, and defaults to 75.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "css",
    'desc'   => "Retrieves css for the sprite, mapping ids to images.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => String,
      'desc'   => "The css output, if the \$output_file is not specified.",
    ),
    'args'   => array(
      array(
        'name'   => "css_namespace",
        'type'   => String,
        'desc'   => "The css class namespace of the sprite. Should be unique within your css.",
      ),
      array(
        'name'   => "sprite_file",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "Path to the sprite image relative to wherever this css is being served. The output image may be passed in datauri format to use inlined sprite images. If this is not set, the image location must be specified elsewhere in the css manually.",
      ),
      array(
        'name'   => "output_file",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "Path to where the css should be saved. If empty or null, the css is returned as a string.",
      ),
      array(
        'name'   => "verbose",
        'type'   => Boolean,
        'value'  => "false",
        'desc'   => "Determines whether the css should include comments with information about the sprite.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "getErrors",
    'desc'   => "Retrieves an associative array of errors encountered while putting together the sprite.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => StringVec,
      'desc'   => "Associative array of errors",
    ),
  ));

DefineFunction(
  array(
    'name'   => "mapping",
    'desc'   => "Returns an associative array mapping the images in the sprite to their dimensions, placement, and css id.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => StringVec,
      'desc'   => "Associative array of mapping",
    ),
  ));

DefineFunction(
  array(
    'name'   => "__destruct",
    'desc'   => "Recovers all memory allocated to the sprite.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "null",
    ),
  ));

EndClass(
);
