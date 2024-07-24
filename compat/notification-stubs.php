<?php

namespace BracketSpace\Notification\Database\Queries {
    /**
     * Notification Queries class
     *
     * @deprecated [Next]
     */
    class NotificationQueries
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
        }
        /**
         * Gets Notification posts.
         *
         * @param bool $includingDisabled If should include disabled notifications as well.
         * @return array<Notification>
         * @since  8.0.0
         */
        public static function all(bool $includingDisabled = false) : array
        {
        }
        /**
         * Gets Notification post by hash.
         *
         * @param string $hash Notification hash.
         * @return ?Notification
         * @since  8.0.0
         */
        public static function withHash(string $hash)
        {
        }
    }
}
namespace BracketSpace\Notification\Traits {
    /**
     * Webhook trait
     *
     * @deprecated [Next]
     */
    trait Webhook
    {
        /**
         * Carrier constructor
         *
         * @param string $name Webhook nice name.
         * @return void
         * @since  7.0.0
         */
        public function __construct($name)
        {
        }
        /**
         * Makes http request
         *
         * @param string $url URL to call.
         * @param array<mixed> $args Arguments. Default: empty.
         * @param array<mixed> $headers Headers. Default: empty.
         * @param string $method HTTP request method.
         * @return void
         * @since  7.0.0
         */
        public function httpRequest($url, $args = [], $headers = [], $method = 'GET')
        {
        }
        /**
         * Parses args to be understand by the wp_remote_* functions
         *
         * @param array<mixed> $args Args from saved fields.
         * @return array<mixed>       Parsed args as key => value array
         * @since  7.0.0
         */
        private function parseArgs($args)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Settings\CoreFields {
    /**
     * HTML class
     */
    class HTML
    {
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * HTML field
         *
         * @param  Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param  string $value Saved value.
         * @return string        Sanitized text
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Cache {
    /**
     * Cache class
     */
    class Cache
    {
        /**
         * Cache unique key
         *
         * @var string
         */
        protected $key;
        /**
         * Constructor
         *
         * @param string $key cache unique key.
         */
        public function __construct($key)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Interfaces {
    /**
     * Cacheable interface
     */
    interface Cacheable
    {
        /**
         * Sets cache value
         *
         * @param mixed $value value to store.
         */
        public function set($value);
        /**
         * Adds cache if it's not already set
         *
         * @param mixed $value value to store.
         */
        public function add($value);
        /**
         * Gets value from cache
         *
         * @param  boolean $force true if cache will be forced to get from storage.
         * @return mixed          cached value
         */
        public function get($force);
        /**
         * Deletes value from cache
         */
        public function delete();
    }
}
namespace BracketSpace\Notification\Utils\Cache {
    /**
     * Transient cache
     */
    class Transient extends \BracketSpace\Notification\Utils\Cache\Cache implements \BracketSpace\Notification\Utils\Interfaces\Cacheable
    {
        /**
         * Cache expiration in seconds
         *
         * @var integer
         */
        protected $expiration;
        /**
         * Constructor
         *
         * @param string  $key        cache unique key.
         * @param integer $expiration expiration in seconds.
         */
        public function __construct($key, $expiration = 0)
        {
        }
        /**
         * Sets cache value
         *
         * @param mixed $value value to store.
         * @return object $this
         */
        public function set($value)
        {
        }
        /**
         * Adds cache if it's not already set
         *
         * @param mixed $value value to store.
         * @return object $this
         */
        public function add($value)
        {
        }
        /**
         * Gets value from cache
         *
         * @param  boolean $force not used, transients are always get from storage.
         * @return mixed          cached value
         */
        public function get($force = true)
        {
        }
        /**
         * Deletes value from cache
         *
         * @return object $this
         */
        public function delete()
        {
        }
    }
    /**
     * Object cache
     */
    class ObjectCache extends \BracketSpace\Notification\Utils\Cache\Cache implements \BracketSpace\Notification\Utils\Interfaces\Cacheable
    {
        /**
         * Cache group
         *
         * @var string
         */
        protected $group;
        /**
         * Constructor
         *
         * @param string $key   cache unique key.
         * @param string $group cache group, optional.
         */
        public function __construct($key, $group = '')
        {
        }
        /**
         * Sets cache value
         *
         * @param mixed $value value to store.
         * @return object $this
         */
        public function set($value)
        {
        }
        /**
         * Adds cache if it's not already set
         *
         * @param mixed $value value to store.
         * @return object $this
         */
        public function add($value)
        {
        }
        /**
         * Gets value from cache
         *
         * @param  boolean $force not used, transients are always get from storage.
         * @return mixed          cached value
         */
        public function get($force = false)
        {
        }
        /**
         * Deletes value from cache
         *
         * @return object $this
         */
        public function delete()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Adaptable interface
     *
     * @mixin \BracketSpace\Notification\Core\Notification
     */
    interface Adaptable
    {
        /**
         * Reads the data
         *
         * @param mixed $input Input data.
         * @return $this
         */
        public function read($input = null);
        /**
         * Saves the data
         *
         * @return mixed
         */
        public function save();
        /**
         * Gets Notification object
         *
         * @return \BracketSpace\Notification\Core\Notification
         */
        public function getNotification();
    }
}
namespace BracketSpace\Notification\Abstracts {
    /**
     * Adapter class
     *
     * @mixin \BracketSpace\Notification\Core\Notification
     * @deprecated [Next]
     */
    abstract class Adapter implements \BracketSpace\Notification\Interfaces\Adaptable
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Notification object
         *
         * @var \BracketSpace\Notification\Core\Notification
         */
        protected $notification;
        /**
         * Class constructor
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         */
        public function __construct(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Pass the method calls to Notification object
         *
         * @param string $methodName Method name.
         * @param array<mixed> $arguments Arguments.
         * @return mixed
         * @since  6.0.0
         */
        public function __call($methodName, $arguments)
        {
        }
        /**
         * Gets Notification object
         *
         * @return \BracketSpace\Notification\Core\Notification
         * @since  6.0.0
         */
        public function getNotification()
        {
        }
        /**
         * Sets up Notification object with data.
         *
         * phpcs:ignore SlevomatCodingStandard.Namespaces.FullyQualifiedClassNameInAnnotation.NonFullyQualifiedClassName
         * @param array<mixed> $data Data array.
         * @return \BracketSpace\Notification\Core\Notification
         * @since  6.0.0
         */
        public function setupNotification($data = [])
        {
        }
        /**
         * Checks if enabled
         *
         * @return bool
         * @since  6.0.0
         */
        public function isEnabled()
        {
        }
        /**
         * Registers Notification
         *
         * @return void
         * @since  6.0.0
         */
        public function registerNotification()
        {
        }
    }
}
namespace BracketSpace\Notification\Defaults\Adapter {
    /**
     * JSON Adapter class
     *
     * @deprecated [Next]
     */
    class JSON extends \BracketSpace\Notification\Abstracts\Adapter
    {
        /**
         * {@inheritdoc}
         *
         * @param string $input JSON string.
         * @return $this
         * @throws \Exception If wrong input param provided.
         */
        public function read($input = null)
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param int|null $jsonOptions JSON options, pass null to use default as well.
         * @param bool $onlyEnabledCarriers If only enabled Carriers should be saved.
         * @return mixed
         */
        public function save($jsonOptions = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE, $onlyEnabledCarriers = false)
        {
        }
    }
    /**
     * WordPress Adapter class
     *
     * @mixin \BracketSpace\Notification\Core\Notification
     * @deprecated [Next]
     */
    class WordPress extends \BracketSpace\Notification\Abstracts\Adapter
    {
        /**
         * Notification post
         *
         * @var \WP_Post
         */
        protected $post;
        /**
         * Notification post type slug
         *
         * @var string
         */
        protected $postType = 'notification';
        /**
         * {@inheritdoc}
         *
         * @param mixed $input Input data.
         * @return $this|void
         * @throws \Exception If wrong input param provided.
         */
        public function read($input = null)
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return $this|\WP_Error
         */
        public function save()
        {
        }
        /**
         * Checks if notification post has been just started
         *
         * @return bool
         * @since 6.0.0
         */
        public function isNew()
        {
        }
        /**
         * Gets notification post ID
         *
         * @return int post ID
         * @since 6.0.0
         */
        public function getId()
        {
        }
        /**
         * Gets post
         *
         * @return \WP_Post|null
         * @since 6.0.0
         */
        public function getPost()
        {
        }
        /**
         * Sets post
         *
         * @param \WP_Post $post WP Post to set.
         * @return $this
         * @since 6.0.0
         */
        public function setPost(\WP_Post $post)
        {
        }
        /**
         * Sets post type
         *
         * @param string $postType WP Post Type.
         * @return $this
         * @since 6.0.0
         */
        public function setPostType($postType)
        {
        }
        /**
         * Checks if adapter already have the post
         *
         * @return bool
         * @since 6.0.0
         */
        public function hasPost()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Nameable interface
     */
    interface Nameable
    {
        /**
         * Gets name
         *
         * @return string name
         */
        public function getName();
        /**
         * Gets slug
         *
         * @return string slug
         */
        public function getSlug();
    }
    /**
     * Receivable interface
     */
    interface Receivable extends \BracketSpace\Notification\Interfaces\Nameable
    {
        /**
         * Parses saved value something understood by notification
         * Must be defined in the child class
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '');
        /**
         * Returns input object
         * Must be defined in the child class
         *
         * @return object
         */
        public function input();
        /**
         * Gets default value
         *
         * @return string
         */
        public function getDefaultValue();
    }
}
namespace BracketSpace\Notification\Traits {
    /**
     * ClassUtils trait
     */
    trait ClassUtils
    {
        /**
         * Get short class name without namespace
         *
         * @return string
         */
        public function getShortClassName()
        {
        }
        /**
         * Get nice class names with title case and spaces
         *
         * @return string
         */
        public function getNiceClassName()
        {
        }
        /**
         * Get class slug with dash separators
         *
         * @return string
         */
        public function getClassSlug()
        {
        }
    }
    /**
     * HasName trait
     */
    trait HasName
    {
        /**
         * Human readable, translated name
         *
         * @var string
         */
        protected $name;
        /**
         * Gets name
         *
         * If the name is not set, automatically generated
         * one is used with title case and spaces.
         *
         * @return string name
         */
        public function getName()
        {
        }
        /**
         * Sets name
         *
         * @param string $name Name.
         * @return $this
         */
        public function setName(string $name)
        {
        }
    }
    /**
     * HasSlug trait
     */
    trait HasSlug
    {
        /**
         * Object slug
         *
         * @var string
         */
        protected $slug;
        /**
         * Gets slug
         *
         * If the slug is not set, automatically generated
         * one is used with words separated by `-`.
         *
         * @return string slug
         */
        public function getSlug()
        {
        }
        /**
         * Sets slug
         *
         * @param string $slug Slug.
         * @return $this
         */
        public function setSlug(string $slug)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Recipient {
    /**
     * Recipient abstract class
     */
    abstract class BaseRecipient implements \BracketSpace\Notification\Interfaces\Receivable
    {
        use \BracketSpace\Notification\Traits\ClassUtils;
        use \BracketSpace\Notification\Traits\HasName;
        use \BracketSpace\Notification\Traits\HasSlug;
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * List of available return fields.
         */
        protected const AVAILABLE_RETURN_FIELDS = ['ID', 'user_email'];
        /**
         * Return field key name.
         *
         * @var string
         */
        protected $returnField = 'user_email';
        /**
         * Recipient input default value
         *
         * @var string
         */
        protected $defaultValue;
        /**
         * Recipient constructor
         *
         * @param array<mixed> $params recipient configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Parses saved value something understood by the Carrier
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed> array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * Returns input object
         *
         * @return \BracketSpace\Notification\Interfaces\Fillable
         */
        public abstract function input();
        /**
         * Gets default value
         *
         * @return string
         */
        public function getDefaultValue()
        {
        }
    }
}
namespace BracketSpace\Notification\Defaults\Recipient {
    /**
     * Webhook recipient
     *
     * @deprecated [Next]
     */
    class Webhook extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @param string $slug webook type slug.
         * @param string $name webook type name.
         * @since 5.0.0
         */
        public function __construct($slug, $name)
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Sendable interface
     */
    interface Sendable extends \BracketSpace\Notification\Interfaces\Nameable
    {
        /**
         * Activates the Carrier
         *
         * @return $this
         */
        public function activate();
        /**
         * Sends the carrier
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger trigger object.
         * @return void
         */
        public function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger);
        /**
         * Generates an unique hash for carrier instance
         *
         * @return string
         */
        public function hash();
        /**
         * Gets form fields array
         *
         * @return array<\BracketSpace\Notification\Interfaces\Fillable> fields
         */
        public function getFormFields();
        /**
         * Checks if Carrier is enabled
         *
         * @return bool
         */
        public function isEnabled();
        /**
         * Checks if Carrier is active
         *
         * @return bool
         */
        public function isActive();
        /**
         * Sets data from array
         *
         * @param array<string,mixed> $data Data with keys matched with Field names.
         * @return $this
         */
        public function setData($data);
        /**
         * Gets data
         *
         * @return array<string,mixed>
         */
        public function getData();
        /**
         * Enables the Carrier
         *
         * @return $this
         */
        public function enable();
        /**
         * Disables the Carrier
         *
         * @return $this
         */
        public function disable();
        /**
         * Gets form fields array
         *
         * @param string $fieldName Field name.
         * @return mixed              Field object or null.
         */
        public function getFormField($fieldName);
        /**
         * Gets the saved recipients
         *
         * @return array<mixed>
         */
        public function getRecipients();
        /**
         * Gets field value
         *
         * @param string $fieldSlug field slug.
         * @return mixed            value or null if field not available
         */
        public function getFieldValue($fieldSlug);
        /**
         * Gets the recipients field
         * Calls the field closure.
         *
         * @return \BracketSpace\Notification\Repository\Field\RecipientsField|null
         * @since  8.0.0
         */
        public function getRecipientsField();
        /**
         * Checks if the recipients field was added
         *
         * @return bool
         * @since  8.0.0
         */
        public function hasRecipientsField();
    }
}
namespace BracketSpace\Notification\Repository\Carrier {
    /**
     * Carrier abstract class
     */
    abstract class BaseCarrier implements \BracketSpace\Notification\Interfaces\Sendable
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        use \BracketSpace\Notification\Traits\ClassUtils;
        use \BracketSpace\Notification\Traits\HasName;
        use \BracketSpace\Notification\Traits\HasSlug;
        /**
         * Form fields
         *
         * @var array<Interfaces\Fillable>
         */
        public $formFields = [];
        /**
         * Recipients form field closure
         *
         * @var callable(): \BracketSpace\Notification\Repository\Field\RecipientsField|null
         */
        protected $recipientsField;
        /**
         * Recipients form field index
         *
         * @var int
         */
        public $recipientsFieldIndex = 0;
        /**
         * Recipients form field raw data
         *
         * @var mixed
         */
        public $recipientsData;
        /**
         * Recipients form field resolved data
         *
         * @var array<mixed>
         */
        public $recipientsResolvedData;
        /**
         * Fields data for send method
         *
         * @var array<mixed>
         */
        public $data = [];
        /**
         * Restricted form field keys
         *
         * @var array<string>
         */
        public $restrictedFields = ['_nonce', 'activated', 'enabled'];
        /**
         * If is suppressed
         *
         * @var bool
         */
        protected $suppressed = false;
        /**
         * Carrier icon
         *
         * @var string SVG
         */
        //phpcs:ignore Generic.Files.LineLength.TooLong
        public $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 143.3 152.5"><path d="M119.8,120.8V138a69.47,69.47,0,0,1-43.2,14.5q-32.4,0-55-22.2Q-1.05,108-1,75.9c0-15.6,3.9-29.2,11.8-40.7A82,82,0,0,1,40.7,8.3,74,74,0,0,1,75.6,0a71.79,71.79,0,0,1,31,6.6,69.31,69.31,0,0,1,25.3,21.8c6.9,9.6,10.4,21.2,10.4,34.8,0,13.8-3.3,25.5-9.9,35.3s-14.3,14.7-23.1,14.7c-10.6,0-16-6.9-16-20.6V82.3C93.3,63.4,86.4,54,72.5,54c-6.2,0-11.2,2.2-14.8,6.5a23.85,23.85,0,0,0-5.4,15.8,19.46,19.46,0,0,0,6.2,14.9,21.33,21.33,0,0,0,15.1,5.7,21.75,21.75,0,0,0,13.8-4.7v16.6a27.67,27.67,0,0,1-15.5,4.3q-15.3,0-25.8-10.2t-10.5-27c0-15.5,6.8-26.7,20.4-33.8a36.74,36.74,0,0,1,17.9-4.3c12.2,0,21.7,4.5,28.5,13.6,5.2,6.9,7.9,17.4,7.9,31.5v8.5c0,3.1,1,4.7,3,4.7,3,0,5.7-3.2,8.3-9.6A56.78,56.78,0,0,0,125.4,65q0-28.95-23.6-42.9h.2c-8.1-4.3-17.4-6.4-28.1-6.4a57.73,57.73,0,0,0-28.7,7.7A58.91,58.91,0,0,0,24,45.1a61.18,61.18,0,0,0-8.2,31.5c0,17.2,5.7,31.4,17,42.7s25.7,16.9,43,16.9c9.6,0,17.5-1.2,23.6-3.5S112.3,126.5,119.8,120.8Z" transform="translate(1)"/></svg>';
        /**
         * Carrier constructor
         *
         * @param string $slug Slug, optional.
         * @param string $name Nice name, optional.
         */
        public function __construct($slug = null, $name = null)
        {
        }
        /**
         * Clone method
         * Copies the fields to new Carrier instance
         *
         * @return void
         * @since  5.1.6
         */
        public function __clone()
        {
        }
        /**
         * Used to register Carrier form fields
         * Uses $this->addFormField();
         *
         * @return void
         */
        public function formFields()
        {
        }
        /**
         * Sends the Carrier
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger trigger object.
         * @return void
         */
        public abstract function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger);
        /**
         * Generates an unique hash for Carrier instance
         *
         * @return string
         */
        public function hash()
        {
        }
        /**
         * Adds form field to collection
         *
         * @param \BracketSpace\Notification\Interfaces\Fillable $field Field object.
         * @return $this
         * @throws \Exception When restricted name is used.
         * @since  6.0.0 Added restricted field check.
         */
        public function addFormField(\BracketSpace\Notification\Interfaces\Fillable $field)
        {
        }
        /**
         * Adds recipients form field
         *
         * @param array<mixed> $params Recipients field params.
         * @return $this
         * @throws \Exception When recipients fields was already added.
         * @since  8.0.0
         */
        public function addRecipientsField(array $params = [])
        {
        }
        /**
         * Checks if the recipients field was added
         *
         * @return bool
         * @since  8.0.0
         */
        public function hasRecipientsField()
        {
        }
        /**
         * Gets the recipients field
         * Calls the field closure.
         *
         * @return \BracketSpace\Notification\Repository\Field\RecipientsField|null
         * @since  8.0.0
         */
        public function getRecipientsField()
        {
        }
        /**
         * Gets the saved recipients
         *
         * @return mixed
         */
        public function getRecipients()
        {
        }
        /**
         * Gets form fields array
         *
         * @return array<\BracketSpace\Notification\Interfaces\Fillable> fields
         */
        public function getFormFields()
        {
        }
        /**
         * Gets form fields array
         *
         * @param string $fieldName Field name.
         * @return Interfaces\Fillable|null Field object or null.
         * @since  6.0.0
         */
        public function getFormField($fieldName)
        {
        }
        /**
         * Gets field value
         *
         * @param string $fieldSlug field slug.
         * @return mixed              value or null if field not available
         */
        public function getFieldValue($fieldSlug)
        {
        }
        /**
         * Resolves all fields
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return void
         * @since  6.0.0
         */
        public function resolveFields(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Resolves Merge Tags in field value
         *
         * @param mixed $value String or array, field value.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return mixed
         * @since 6.0.0
         */
        protected function resolveValue($value, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Prepares saved data for easy use in send() method
         * Saves all the values in $data property
         *
         * @return void
         * @since  5.0.0
         */
        public function prepareData()
        {
        }
        /**
         * Parses the recipients to a flat array.
         *
         * It needs recipients_resolved_data property so the
         * resolve_fields method needs to be called beforehand.
         *
         * @return array<int,mixed>
         * @since  8.0.0
         */
        public function parseRecipients()
        {
        }
        /**
         * Sets data from array
         *
         * @param array<mixed> $data Data with keys matched with Field names.
         * @return $this
         * @since  6.0.0
         */
        public function setData($data)
        {
        }
        /**
         * Sets field data
         *
         * @param \BracketSpace\Notification\Interfaces\Fillable $field Field.
         * @param mixed $data Field data.
         * @return void
         * @since  8.0.0
         */
        protected function setFieldData(\BracketSpace\Notification\Interfaces\Fillable $field, $data)
        {
        }
        /**
         * Gets data
         *
         * @return array<string,mixed>
         * @since  6.0.0
         */
        public function getData()
        {
        }
        /**
         * Checks if Carrier is active
         *
         * @return bool
         * @since  6.3.0
         */
        public function isActive()
        {
        }
        /**
         * Activates the Carrier
         *
         * @return $this
         * @since  6.3.0
         */
        public function activate()
        {
        }
        /**
         * Deactivates the Carrier
         *
         * @return $this
         * @since  6.3.0
         */
        public function deactivate()
        {
        }
        /**
         * Checks if Carrier is enabled
         *
         * @return bool
         * @since  6.0.0
         */
        public function isEnabled()
        {
        }
        /**
         * Enables the Carrier
         *
         * @return $this
         * @since  6.0.0
         */
        public function enable()
        {
        }
        /**
         * Disables the Carrier
         *
         * @return $this
         * @since  6.0.0
         */
        public function disable()
        {
        }
        /**
         * Checks if Carrier is suppressed
         *
         * @return bool
         * @since  5.1.2
         */
        public function isSuppressed()
        {
        }
        /**
         * Suppresses the Carrier
         *
         * @return void
         * @since  5.1.2
         */
        public function suppress()
        {
        }
    }
}
namespace BracketSpace\Notification\Defaults\Carrier {
    /**
     * Webhook Carrier
     *
     * @deprecated [Next]
     */
    class WebhookJson extends \BracketSpace\Notification\Repository\Carrier\BaseCarrier
    {
        use \BracketSpace\Notification\Traits\Webhook;
        /**
         * Carrier icon
         *
         * @var string SVG
         */
        //phpcs:ignore Generic.Files.LineLength.TooLong
        public $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 402.07 372.81"><path d="M100.7,239.8q23.25-38,46.9-76.5c-22.1-21.5-32.4-47.5-30.2-78,1.7-23.7,11.5-44,28.9-60.5C180-7,232.8-8.4,269,21.6c36.6,30.3,44.7,82.2,22.8,119.7-8.2-4.8-16.5-9.5-25.1-14.5,9.5-20.3,9.7-40.5-.5-60.5a63.54,63.54,0,0,0-34.4-31.1c-29.3-11.5-61.2.6-76.3,28.3-14.3,26.3-9.1,72,32.8,91.6-20.8,33.9-41.7,67.7-62.4,101.5,11.5,20,6.8,40.2-7.7,52.3-13,10.9-31.3,11.7-45.6,2.2A39.54,39.54,0,0,1,56.4,267C61.9,248.4,75.3,240.1,100.7,239.8Z" transform="translate(0.01 0.01)"/><path d="M90.9,184.8v28.9c-20.6,2.5-37.2,12.1-48.8,29.8-9,13.7-12.2,28.7-10.3,44.9a60.28,60.28,0,0,0,58.7,53.2c20.7.4,38-7.7,51.4-23.5s16.9-34.3,14.5-55.1H270.5c12.4-21.6,34-26.5,50.4-19.7a38.83,38.83,0,0,1,23.5,40.6c-2,16.7-15.6,31.2-32,33.9-18.9,3.2-34.1-5.5-43.3-24.9H186.4c-8.7,57.3-66.3,90.4-117.3,76.9-45.9-12.1-75.6-58-67.9-104.6C9.9,212.7,54.1,185,90.9,184.8Z" transform="translate(0.01 0.01)"/><path d="M212.7,132.1c-23.6-1.7-38-12.7-41.7-31.3a38.1,38.1,0,0,1,19.9-41.5A39.61,39.61,0,0,1,238,67.2c13.4,14.1,14,30.1,1.5,51.5q19.2,35.4,38.5,71.2c29.3-8.3,56.9-5.2,82.3,11.6,20,13.2,33.2,31.7,39,55a92.71,92.71,0,0,1-60.1,110c-47,16.2-94-6.4-113-40.9,8.2-4.8,16.5-9.6,24.7-14.3,25.6,36.5,69.8,35.9,94.6,17.6,25.2-18.6,33.1-52.5,17.8-79.5-9.8-17.2-24.7-27.7-44.1-31.8s-37,1.2-53.6,12.2C247.8,196.9,230.2,164.5,212.7,132.1Z" transform="translate(0.01 0.01)"/></svg>';
        /**
         * Used to register Carrier form fields
         * Uses $this->addFormField();
         *
         * @return void
         */
        public function formFields()
        {
        }
        /**
         * Sends the notification
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger trigger object.
         * @return void
         */
        public function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
    /**
     * Webhook Carrier
     *
     * @deprecated [Next]
     */
    class Webhook extends \BracketSpace\Notification\Repository\Carrier\BaseCarrier
    {
        use \BracketSpace\Notification\Traits\Webhook;
        /**
         * Carrier icon
         *
         * @var string SVG
         */
        //phpcs:ignore Generic.Files.LineLength.TooLong
        public $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 402.07 372.81"><path d="M100.7,239.8q23.25-38,46.9-76.5c-22.1-21.5-32.4-47.5-30.2-78,1.7-23.7,11.5-44,28.9-60.5C180-7,232.8-8.4,269,21.6c36.6,30.3,44.7,82.2,22.8,119.7-8.2-4.8-16.5-9.5-25.1-14.5,9.5-20.3,9.7-40.5-.5-60.5a63.54,63.54,0,0,0-34.4-31.1c-29.3-11.5-61.2.6-76.3,28.3-14.3,26.3-9.1,72,32.8,91.6-20.8,33.9-41.7,67.7-62.4,101.5,11.5,20,6.8,40.2-7.7,52.3-13,10.9-31.3,11.7-45.6,2.2A39.54,39.54,0,0,1,56.4,267C61.9,248.4,75.3,240.1,100.7,239.8Z" transform="translate(0.01 0.01)"/><path d="M90.9,184.8v28.9c-20.6,2.5-37.2,12.1-48.8,29.8-9,13.7-12.2,28.7-10.3,44.9a60.28,60.28,0,0,0,58.7,53.2c20.7.4,38-7.7,51.4-23.5s16.9-34.3,14.5-55.1H270.5c12.4-21.6,34-26.5,50.4-19.7a38.83,38.83,0,0,1,23.5,40.6c-2,16.7-15.6,31.2-32,33.9-18.9,3.2-34.1-5.5-43.3-24.9H186.4c-8.7,57.3-66.3,90.4-117.3,76.9-45.9-12.1-75.6-58-67.9-104.6C9.9,212.7,54.1,185,90.9,184.8Z" transform="translate(0.01 0.01)"/><path d="M212.7,132.1c-23.6-1.7-38-12.7-41.7-31.3a38.1,38.1,0,0,1,19.9-41.5A39.61,39.61,0,0,1,238,67.2c13.4,14.1,14,30.1,1.5,51.5q19.2,35.4,38.5,71.2c29.3-8.3,56.9-5.2,82.3,11.6,20,13.2,33.2,31.7,39,55a92.71,92.71,0,0,1-60.1,110c-47,16.2-94-6.4-113-40.9,8.2-4.8,16.5-9.6,24.7-14.3,25.6,36.5,69.8,35.9,94.6,17.6,25.2-18.6,33.1-52.5,17.8-79.5-9.8-17.2-24.7-27.7-44.1-31.8s-37,1.2-53.6,12.2C247.8,196.9,230.2,164.5,212.7,132.1Z" transform="translate(0.01 0.01)"/></svg>';
        /**
         * Used to register Carrier form fields
         * Uses $this->addFormField();
         *
         * @return void
         */
        public function formFields()
        {
        }
        /**
         * Sends the notification
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger trigger object.
         * @return void
         */
        public function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
}
namespace {
    /*!
     * ISC License
     *
     * Copyright (c) 2018-2021, Andrea Giammarchi, @WebReflection
     *
     * Permission to use, copy, modify, and/or distribute this software for any
     * purpose with or without fee is hereby granted, provided that the above
     * copyright notice and this permission notice appear in all copies.
     *
     * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
     * REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
     * AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
     * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
     * LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE
     * OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
     * PERFORMANCE OF THIS SOFTWARE.
     */
    class FlattedString
    {
        public $value = '';
        public function __construct($value)
        {
        }
    }
    class Flatted
    {
        // public utilities
        public static function parse($json, $assoc = \false, $depth = 512, $options = 0)
        {
        }
        public static function stringify($value, $options = 0, $depth = 512)
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Core {
    /**
     * Whitelabel test case.
     */
    class TestWhitelabel extends \WP_UnitTestCase
    {
        /**
         * Test enabling whitelabeling
         *
         * @since 8.0.0
         */
        public function test_enabling_whitelabeling()
        {
        }
    }
    /**
     * Sync test case.
     */
    class TestSync extends \WP_UnitTestCase
    {
        /**
         * Test enabling syncing
         *
         * @since 8.0.0
         */
        public function test_enabling_syncing()
        {
        }
        /**
         * Test disabling syncing
         *
         * @since 8.0.0
         */
        public function test_disabling_syncing()
        {
        }
        /**
         * Test enabling syncing with default theme path
         *
         * @since 8.0.0
         */
        public function test_enabling_syncing_with_default_dir()
        {
        }
        /**
         * Test enabling syncing twice, which shouldn't be possible
         *
         * @since 8.0.0
         */
        public function test_enabling_syncing_twice()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
    /**
     * Notification test case.
     */
    class TestNotification extends \WP_UnitTestCase
    {
        /**
         * Test hash creation
         *
         * @since 6.0.0
         */
        public function test_hash()
        {
        }
        /**
         * Test title
         *
         * @since 6.0.0
         */
        public function test_title()
        {
        }
        /**
         * Test trigger
         *
         * @since 6.0.0
         */
        public function test_trigger()
        {
        }
        /**
         * Test trigger exception
         *
         * @since 6.0.0
         */
        public function test_trigger_exception()
        {
        }
        /**
         * Test carriers
         *
         * @since 6.0.0
         */
        public function test_carriers()
        {
        }
        /**
         * Test carriers exception
         *
         * @since 6.0.0
         */
        public function test_carriers_exception()
        {
        }
        /**
         * Test enabled
         *
         * @since 6.0.0
         */
        public function test_enabled()
        {
        }
        /**
         * Test extras
         *
         * @since 6.0.0
         */
        public function test_extras()
        {
        }
        /**
         * Test extras exception
         *
         * @since 6.0.0
         */
        public function test_extras_exception()
        {
        }
        /**
         * Test version
         *
         * @since 6.0.0
         */
        public function test_version()
        {
        }
        /**
         * Test create_hash
         *
         * @since 6.0.0
         */
        public function test_create_hash()
        {
        }
        /**
         * Test add_carrier object
         *
         * @since 6.0.0
         */
        public function test_add_carrier_object()
        {
        }
        /**
         * Test add_carrier existing exception
         *
         * @since 6.0.0
         */
        public function test_add_notification_existing_exception()
        {
        }
        /**
         * Test add_carrier not-existing exception
         *
         * @since 6.0.0
         */
        public function test_add_carrier_not_existing_exception()
        {
        }
        /**
         * Test get_carrier
         *
         * @since 6.0.0
         */
        public function test_get_carrier()
        {
        }
        /**
         * Test enable_carrier
         *
         * @since 6.0.0
         */
        public function test_enable_carrier()
        {
        }
        /**
         * Test enable_carrier and adding
         *
         * @since 6.0.0
         */
        public function test_enable_carrier_adding()
        {
        }
        /**
         * Test disable_carrier
         *
         * @since 6.0.0
         */
        public function test_disable_carrier()
        {
        }
        /**
         * Test get_extra
         *
         * @since 6.0.0
         */
        public function test_get_extra()
        {
        }
        /**
         * Test from
         */
        public function test_from()
        {
        }
        /**
         * Test to
         */
        public function test_to()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
    /**
     * Main test case.
     */
    class TestMain extends \WP_UnitTestCase
    {
        /**
         * Notification Runtime
         */
        public $notification;
        /**
         * Setup test
         *
         * @since 5.2.3
         */
        public function setUp() : void
        {
        }
        /**
         * Test Runtime instance
         *
         * @since 5.2.3
         */
        public function test_runtime()
        {
        }
        /**
         * Test boot method
         *
         * @since 5.2.3
         */
        public function test_boot()
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Recipient {
    class TestRecipientStore extends \WP_UnitTestCase
    {
        /**
         * Test recipient registration
         *
         * @since 6.3.0
         */
        public function test_recipient_registration_action()
        {
        }
        /**
         * Test getting recipients
         *
         * @since 6.3.0
         */
        public function test_getting_recipient()
        {
        }
        /**
         * Test getting recipients
         *
         * @since 6.3.0
         */
        public function test_getting_recipients()
        {
        }
        /**
         * Test getting carrier recipients
         *
         * @since 6.3.0
         */
        public function test_getting_carrier_recipients()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Traits {
    /**
     * Main test case.
     */
    class TestClassUtils extends \WP_UnitTestCase
    {
        /**
         * Dummy Class
         */
        public $sut;
        /**
         * Setup test
         *
         * @since 5.2.3
         */
        public function setUp() : void
        {
        }
        public function test_automatically_generated_name()
        {
        }
        public function test_automatically_generated_slug()
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Triggers {
    /**
     * Trigger Store test case.
     */
    class TestTriggerStore extends \WP_UnitTestCase
    {
        /**
         * Test getting trigger
         *
         * @since 6.3.0
         */
        public function test_getting_trigger()
        {
        }
        public function test_getting_triggers()
        {
        }
        /**
         * Test getting triggers grouped
         *
         * @since 6.3.0
         */
        public function test_getting_triggers_grouped()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
    /**
     * Trigger test case.
     */
    class TestTrigger extends \WP_UnitTestCase
    {
        /**
         * Tests trigger action
         *
         * @since 5.3.1
         * @since 6.0.0 Changed to Registerer class and used new naming convention.
         */
        public function test_trigger_action()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Resolvers {
    class TestResolverStore extends \WP_UnitTestCase
    {
        /**
         * Test resolver registration
         *
         * @since 6.3.0
         */
        public function test_resolver_registration_action()
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Carriers {
    class TestCarierStore extends \WP_UnitTestCase
    {
        /**
         * Test carier registration
         *
         * @since 6.3.0
         */
        public function test_carrier_registration_action()
        {
        }
        /**
         * Test getting carriers
         *
         * @since 6.3.0
         */
        public function test_getting_carriers()
        {
        }
        /**
         * Test getting carrier
         *
         * @since 6.3.0
         */
        public function test_getting_carrier()
        {
        }
        /**
         * Clears after the test
         *
         * @since  8.0.0
         * @return void
         */
        public function tearDown() : void
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Helpers {
    /**
     * NotificationPost helper class
     */
    class NotificationPost
    {
        /**
         * Inserts notification post based on trigger and carrier
         *
         * @since  5.3.1
         * @since  6.0.0 Changed to adapter implementation
         * @param  Triggerable $trigger Trigger class or slug.
         * @param  Sendable    $carrier Carrier class or slug.
         * @return Adaptable            Notification WordPress adapter.
         */
        public static function insert(\BracketSpace\Notification\Interfaces\Triggerable $trigger, \BracketSpace\Notification\Interfaces\Sendable $carrier)
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Helpers\Objects {
    /**
     * Recipient class
     */
    class Recipient extends \BracketSpace\Notification\Abstracts\Recipient
    {
        /**
         * Recipient input default value
         *
         * @var string
         */
        protected $default_value;
        /**
         * Recipient constructor
         *
         * @since 6.3.0
         */
        public function __construct()
        {
        }
        /**
         * Parses saved value something understood by the Carrier
         *
         * @param  string $value raw value saved by the user.
         * @return void
         */
        public function parse_value($value = '')
        {
        }
        /**
         * Returns input object
         *
         * @return void
         */
        public function input()
        {
        }
        /**
         * Gets default value
         *
         * @return string
         */
        public function get_default_value()
        {
        }
    }
    /**
     * Resolver class
     */
    class Resolver extends \BracketSpace\Notification\Abstracts\Resolver
    {
        /**
         * Dummy resolver slug
         *
         * @since 6.3.0
         * @return string
         */
        public function get_slug()
        {
        }
        /**
         * Gets merge tag pattern
         *
         * @return void
         */
        public function get_pattern()
        {
        }
        /**
         * Gets resolver priority
         *
         * @return void
         */
        public function get_priority()
        {
        }
        /**
         * Resolves single matched merge tag
         *
         * @param array       $match   Match array.
         * @param Triggerable $trigger Trigger object.
         * @return void
         */
        public function resolve_merge_tag($match, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
    /**
     * PostponedTrigger class
     */
    class PostponedTrigger extends \BracketSpace\Notification\Abstracts\Trigger
    {
        /**
         * Constructor
         */
        public function __construct($tag)
        {
        }
        /**
         * Trigger action
         *
         * @since  5.3.1
         * @return void
         */
        public function action()
        {
        }
        /**
         * Registers merge tags
         *
         * @since  5.3.1
         * @return void
         */
        public function merge_tags()
        {
        }
    }
    /**
     * Carrier class
     */
    class Carrier extends \BracketSpace\Notification\Abstracts\Carrier
    {
        /**
         * Is sent flag
         *
         * @var boolean
         */
        public $is_sent = false;
        /**
         * Dummy notification constructor
         *
         * @since 5.3.1
         */
        public function __construct($slug)
        {
        }
        /**
         * Used to register notification form fields
         *
         * @since 5.3.1
         * @return void
         */
        public function formFields()
        {
        }
        /**
         * Sends the notification
         *
         * @since 5.3.1
         * @param  Triggerable $trigger trigger object.
         * @return void
         */
        public function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
    /**
     * SimpleTrigger class
     */
    class SimpleTrigger extends \BracketSpace\Notification\Abstracts\Trigger
    {
        /**
         * Constructor
         */
        public function __construct($tag)
        {
        }
        /**
         * Registers merge tags
         *
         * @since  5.3.1
         * @return void
         */
        public function merge_tags()
        {
        }
    }
    /**
     * DummyClassName class
     */
    class DummyClassName
    {
        use \BracketSpace\Notification\Traits\ClassUtils, \BracketSpace\Notification\Traits\HasName, \BracketSpace\Notification\Traits\HasSlug, \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
    }
}
namespace BracketSpace\Notification\Tests\Helpers {
    /**
     * Registerer helper class
     */
    class Registerer
    {
        /**
         * Registers Trigger
         *
         * @since  6.0.0
         * @param  bool $postponed If Trigger should be Postponed Trigger.
         * @return Objects\Notification Registered Trigger.
         */
        public static function register_trigger($tag = null, $postponed = false)
        {
        }
        /**
         * Clears all Triggers
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear_triggers()
        {
        }
        /**
         * Registers Carrier
         *
         * @since  6.0.0
         * @return Objects\Carrier Registered Carrier.
         */
        public static function register_carrier($carrier_slug = 'dummmy')
        {
        }
        /**
         * Clears all Carriers
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear_carriers()
        {
        }
        /**
         * Registers Notification
         *
         * @since  6.0.0
         * @param  mixed $trigger  Trigger object or null
         * @param  array $carriers Array of Carrier objects
         * @return Notification     Registered Notification.
         */
        public static function register_notification($trigger = null, $carriers = [])
        {
        }
        /**
         * Registers Default Notification
         *
         * @since  6.0.0
         * @param  bool $postponed If trigger should be postponed.
         * @return Notification Registered Notification.
         */
        public static function register_default_notification($postponed = false)
        {
        }
        /**
         * Clears all Notifications
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear_notifications()
        {
        }
        /**
         * Register Resolver
         *
         * @since 6.3.0
         * @return Objects\Resolver Registered Resolver.
         */
        public static function register_resolver()
        {
        }
        /**
         * Clears all Resolvers
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear_resolvers()
        {
        }
        /**
         * Register Recipient
         *
         * @since 6.3.0
         * @param  string            $carrier_slug Carrier slug.
         * @return Objects\Recipient               Registered Recipient.
         */
        public static function register_recipient($carrier_slug = 'dummy_carrier')
        {
        }
        /**
         * Clears all Recipients
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear_recipients()
        {
        }
        /**
         * Clears all registered items
         *
         * @since  8.0.0
         * @return void
         */
        public static function clear()
        {
        }
    }
}
namespace BracketSpace\Notification\Tests\Notifications {
    class TestNotificationStore extends \WP_UnitTestCase
    {
        /**
         * Test notification registration
         *
         * @since 6.3.0
         */
        public function test_notification_registration_action()
        {
        }
    }
}
namespace Tests {
    class UnitTestCase extends \WP_UnitTestCase
    {
        use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
        /**
         * Test set up.
         *
         * @since  [Next]
         * @return void
         */
        protected function setUp() : void
        {
        }
        /**
         * Test tear down.
         *
         * @since  [Next]
         * @return void
         */
        protected function tearDown() : void
        {
        }
    }
}
namespace {
    /**
     * Notification class
     */
    class Notification
    {
        /**
         * Runtime object
         *
         * @var BracketSpace\Notification\Runtime
         */
        protected static $runtime;
        /**
         * Initializes the plugin runtime
         *
         * @since  7.0.0
         * @param  string $pluginFile Main plugin file.
         * @return BracketSpace\Notification\Runtime
         */
        public static function init($pluginFile)
        {
        }
        /**
         * Gets runtime component
         *
         * @since  7.0.0
         * @return array
         */
        public static function components()
        {
        }
        /**
         * Gets runtime component
         *
         * @since  7.0.0
         * @param  class-string $componentName Component name.
         * @return mixed
         */
        public static function component($componentName)
        {
        }
        /**
         * Gets runtime object
         *
         * @since  7.0.0
         * @return BracketSpace\Notification\Runtime
         */
        public static function runtime()
        {
        }
        /**
         * Gets plugin version
         *
         * @since  7.0.0
         * @return string
         */
        public static function version()
        {
        }
        /**
         * Gets plugin filesystem
         *
         * @since  8.0.0
         * @throws \Exception When settings class wasn't invoked yet.
         * @return BracketSpace\Notification\Core\Settings
         */
        public static function settings()
        {
        }
        /**
         * Gets plugin settings instance
         *
         * @since  [Next]
         * @throws \Exception When runtime wasn't invoked yet.
         * @return \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem
         */
        public static function fs()
        {
        }
    }
}
namespace BracketSpace\Notification {
    /**
     * Runtime class
     */
    class Runtime
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\DocHooks\HookTrait;
        /**
         * Plugin version
         */
        const VERSION = '9.0.0';
        /**
         * Main plugin file path
         *
         * @var string
         */
        protected $pluginFile;
        /**
         * Flag for unmet requirements
         *
         * @var bool
         */
        protected $requirementsUnmet;
        /**
         * Filesystems
         *
         * @var \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem
         */
        protected $filesystem;
        /**
         * Components
         *
         * @var array<class-string,mixed>
         */
        protected $components = [];
        /**
         * Class constructor
         *
         * @since 5.0.0
         * @param string $pluginFile plugin main file full path.
         */
        public function __construct($pluginFile)
        {
        }
        /**
         * Loads needed files
         *
         * @since 5.0.0
         * @since 6.0.0 Added boot action.
         * @since 7.0.0 All the defaults and init action are called on initialization.
         * @return void
         */
        public function init()
        {
        }
        /**
         * Registers WP CLI commands
         *
         * @since 8.0.0
         * @return void
         */
        public function cliCommands()
        {
        }
        /**
         * Registers all the hooks with DocHooks
         *
         * @since 6.1.0
         * @return void
         */
        public function registerHooks()
        {
        }
        /**
         * Gets filesystem
         *
         * @since 7.0.0
         * @since 8.0.0 Always return the root filesystem.
         * @param string $deprecated Filesystem name.
         * @return \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem
         */
        public function getFilesystem($deprecated = 'root')
        {
        }
        /**
         * Adds runtime component
         *
         * @throws \Exception When component is already registered.
         * @since 7.0.0
         * @since [Next] Only the component name is accepter
         * @param mixed $component Component.
         * @param null $deprecated Deprecated since [Next].
         * @return $this
         */
        public function addComponent($component, $deprecated = null)
        {
        }
        /**
         * Gets runtime component
         *
         * @since 7.0.0
         * @since [Next] Components are referenced by FQCN.
         * @param string $name Component name.
         * @return mixed       Component or null
         */
        public function component($name)
        {
        }
        /**
         * Gets runtime components
         *
         * @since 7.0.0
         * @return array
         */
        public function components()
        {
        }
        /**
         * Creates needed classes
         * Singletons are used for a sake of performance
         *
         * @since 5.0.0
         * @return void
         */
        public function singletons()
        {
        }
        /**
         * All WordPress actions this plugin utilizes
         *
         * @since 5.0.0
         * @return void
         */
        public function actions()
        {
        }
        /**
         * Loads defaults
         *
         * @action notification/init 8
         *
         * @since 6.0.0
         * @since 8.0.0 Is hooked to notification/init action.
         * @return void
         */
        public function defaults()
        {
        }
        /**
         * Loads default
         *
         * @since  6.0.0
         * @param string $default Default file slug.
         * @param class-string $className Default class name.
         * @return void
         */
        public function loadDefault($default, $className)
        {
        }
        /**
         * Loads bundled extensions
         *
         * @since 7.0.0
         * @return void
         */
        public function loadBundledExtensions()
        {
        }
    }
}
namespace BracketSpace\Notification\Database\Queries {
    /**
     * Users Queries class
     */
    class UserQueries
    {
        /**
         * Gets all users.
         *
         * @return array<int,array{ID: string, user_email: string, display_name: string}>
         */
        public static function all()
        {
        }
        /**
         * Gets users with role.
         *
         * @param string $role user role.
         * @return array<int,array{ID: string, user_email: string, display_name: string}>
         */
        public static function withRole(string $role)
        {
        }
    }
}
namespace BracketSpace\Notification\Database {
    /**
     * This class describes a notification database service.
     *
     * @since [Next]
     */
    class NotificationDatabaseService
    {
        /**
         * Indicates whether an operation is in progress.
         *
         * Returns string with the name of the operation
         * or false if no operation is in progress.
         *
         * @var false|string
         */
        protected static $doingOperation = false;
        /**
         * Last ID of the post that has been created or updated.
         *
         * @var int
         */
        protected static $lastUpsertedPostId = 0;
        /**
         * Gets the notifications table name.
         *
         * @return string The notifications table name.
         */
        public static function getNotificationsTableName() : string
        {
        }
        /**
         * Gets the notification carriers table name.
         *
         * @return string The notification carriers table name.
         */
        public static function getNotificationCarriersTableName() : string
        {
        }
        /**
         * Gets the notification extras table name.
         *
         * @return string The notification extras table name.
         */
        public static function getNotificationExtrasTableName() : string
        {
        }
        /**
         * Checks whether save process is in progress.
         *
         * @return false|string
         */
        public static function doingOperation()
        {
        }
        /**
         * Gets last upserted Post ID.
         *
         * @return int
         */
        public static function getLastUpsertedPostId() : int
        {
        }
        /**
         * Counts the Notifications in database
         *
         * @return int
         */
        public static function count() : int
        {
        }
        /**
         * Translates post ID to Notification object
         *
         * @param int|\WP_Post $post Notification post object or post ID
         * @return ?Notification
         */
        public static function postToNotification($post) : ?\BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * Translates Notification to WP_Post
         *
         * @param string|Notification $notification Notification object or hash.
         * @return ?\WP_Post
         */
        public static function notificationToPost($notification) : ?\WP_Post
        {
        }
        /**
         * Upserts the Notification database entry.
         *
         * @param \BracketSpace\Notification\Core\Notification $notification The notification
         * @return void
         */
        public static function upsert(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Checks if Notification exists in database.
         *
         * @param string $hash Notification hash
         * @return bool
         */
        public static function has($hash)
        {
        }
        /**
         * Gets the Notification from database.
         *
         * @param string $hash Notification hash
         * @return Notification|null
         */
        public static function get($hash)
        {
        }
        /**
         * Gets all the Notifications from database.
         *
         * @return array<string, Notification>
         */
        public static function getAll()
        {
        }
        /**
         * Deletes the Notification from database.
         *
         * @param string $hash Notification hash
         * @return void
         */
        public static function delete($hash)
        {
        }
        /**
         * Deletes the Notification carriers.
         *
         * @param string $hash Notification hash
         * @return void
         */
        public static function deleteCarriers($hash)
        {
        }
        /**
         * Deletes the Notification extras.
         *
         * @param string $hash Notification hash
         * @return void
         */
        public static function deleteExtras($hash)
        {
        }
        /**
         * Gets the cache instance for single notification.
         *
         * @param string $hash Notification hash.
         * @return CacheDriver\ObjectCache
         */
        protected static function getCache($hash)
        {
        }
        /**
         * Gets the cache key for single notification.
         *
         * @param string $hash Notification hash.
         * @return string
         */
        protected static function getCacheKey($hash)
        {
        }
    }
    /**
     * This class describes a database service.
     */
    class DatabaseService
    {
        /**
         * Gets wpdb object.
         *
         * @return \wpdb WPDB class instance
         */
        public static function db() : \wpdb
        {
        }
        /**
         * Prefixes the table name.
         *
         * @param string $tableName The table name
         * @return string The prefixed table name.
         */
        public static function prefixTable(string $tableName) : string
        {
        }
    }
}
namespace BracketSpace\Notification\Repository {
    /**
     * Trigger Repository.
     */
    class TriggerRepository
    {
        /**
         * @return void
         */
        public static function register()
        {
        }
        /**
         * @return void
         */
        public static function registerPostTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerTaxonomyTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerUserTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerMediaTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerCommentTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerWpTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerPluginTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerThemeTriggers()
        {
        }
        /**
         * @return void
         */
        public static function registerPrivacyTriggers()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Triggerable interface
     */
    interface Triggerable extends \BracketSpace\Notification\Interfaces\Nameable
    {
        /**
         * Sets up the merge tags
         *
         * @return void
         */
        public function setupMergeTags();
        /**
         * Gets Trigger's merge tags
         *
         * @param string $type Optional, all|visible|hidden, default: all.
         * @param bool $grouped Optional, default: false.
         * @return array<\BracketSpace\Notification\Interfaces\Taggable>
         */
        public function getMergeTags($type = 'all', $grouped = false);
        /**
         * Clears the merge tags
         *
         * @return $this
         */
        public function clearMergeTags();
        /**
         * Stops the trigger.
         *
         * @return void
         */
        public function stop();
        /**
         * Checks if trigger has been stopped
         *
         * @return bool
         */
        public function isStopped() : bool;
        /**
         * Gets Trigger actions
         *
         * @return array<int, array{tag: string, priority: int, accepted_args: int}>
         * @since 8.0.0
         */
        public function getActions() : array;
        /**
         * Gets group
         *
         * @return string|null
         */
        public function getGroup();
    }
}
namespace BracketSpace\Notification\Traits {
    /**
     * HasDescription trait
     */
    trait HasDescription
    {
        /**
         * Human readable, translated description
         *
         * @var string
         */
        protected $description;
        /**
         * Gets description
         *
         * @return string|null Description
         */
        public function getDescription()
        {
        }
        /**
         * Sets description
         *
         * @param string $description Description.
         * @return $this
         */
        public function setDescription(string $description)
        {
        }
    }
    /**
     * HasGroup trait
     */
    trait HasGroup
    {
        /**
         * Human readable, translated group name
         *
         * @var string
         */
        protected $group;
        /**
         * Gets group
         *
         * @return string|null Group name
         */
        public function getGroup()
        {
        }
        /**
         * Sets group
         *
         * @param string $group Group name.
         * @return $this
         */
        public function setGroup(string $group)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger {
    /**
     * Trigger abstract class
     */
    abstract class BaseTrigger implements \BracketSpace\Notification\Interfaces\Triggerable
    {
        use \BracketSpace\Notification\Traits\ClassUtils;
        use \BracketSpace\Notification\Traits\HasDescription;
        use \BracketSpace\Notification\Traits\HasGroup;
        use \BracketSpace\Notification\Traits\HasName;
        use \BracketSpace\Notification\Traits\HasSlug;
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Flag indicating that trigger
         * has been stopped
         *
         * @var bool
         */
        protected $stopped = false;
        /**
         * Bound actions
         *
         * @var array<int, array{tag: string, priority: int, accepted_args: int}>
         */
        protected $actions = [];
        /**
         * Merge tags
         *
         * @var array<mixed>
         */
        protected $mergeTags = [];
        /**
         * Flag indicating that merge tags has been already added.
         *
         * @var bool
         */
        protected $mergeTagsAdded = false;
        /**
         * Trigger constructor
         *
         * @param string $slug Slug, optional.
         * @param string $name Nice name, optional.
         */
        public function __construct($slug = null, $name = null)
        {
        }
        /**
         * Used to register trigger merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
        /**
         * Sets up the merge tags
         *
         * @return void
         */
        public function setupMergeTags()
        {
        }
        /**
         * Clears the merge tags
         *
         * @return $this
         */
        public function clearMergeTags()
        {
        }
        /**
         * Adds an action listener
         *
         * @param string $tag action hook.
         * @param int $priority action priority, default 10.
         * @param int $acceptedArgs how many args the action accepts, default 1.
         * @since 6.0.0
         * @since 6.3.0 Background processing action now accepts one more param for cache.
         * @since 8.0.0 Only stores the action params in collection.
         * @return void
         *
         */
        public function addAction($tag, $priority = 10, $acceptedArgs = 1)
        {
        }
        /**
         * Removes the action from the actions library.
         *
         * @param string $tag action hook.
         * @param int $priority action priority, default 10.
         * @param mixed $deprecated deprecated.
         * @return void
         */
        public function removeAction($tag, $priority = 10, $deprecated = null)
        {
        }
        /**
         * Gets Trigger actions
         *
         * @return array<int, array{tag: string, priority: int, accepted_args: int}>
         * @since 8.0.0
         */
        public function getActions() : array
        {
        }
        /**
         * Adds Trigger's Merge Tag
         *
         * @param \BracketSpace\Notification\Interfaces\Taggable $mergeTag merge tag object.
         * @return $this
         */
        public function addMergeTag(\BracketSpace\Notification\Interfaces\Taggable $mergeTag)
        {
        }
        /**
         * Quickly adds new Merge Tag
         *
         * @param string $propertyName Trigger property name.
         * @param string $label Nice, translatable Merge Tag label.
         * @param string $group Optional, translatable group name.
         * @since 6.0.0
         * @return $this
         *
         */
        public function addQuickMergeTag($propertyName, $label, $group = null)
        {
        }
        /**
         * Removes Trigger's merge tag
         *
         * @param string $mergeTagSlug Merge Tag slug.
         * @return $this
         */
        public function removeMergeTag($mergeTagSlug)
        {
        }
        /**
         * Gets Trigger's merge tags
         *
         * @param string $type Optional, all|visible|hidden, default: all.
         * @param bool $grouped Optional, default: false.
         * @return array<\BracketSpace\Notification\Interfaces\Taggable>
         * @since 6.0.0 Added param $grouped which makes the array associative
         *               with merge tag slugs as keys.
         */
        public function getMergeTags($type = 'all', $grouped = false)
        {
        }
        /**
         * Stops the trigger.
         *
         * @return void
         * @since 6.2.0
         */
        public function stop()
        {
        }
        /**
         * Resumes the trigger.
         *
         * @return void
         * @since 6.2.0
         */
        public function resume()
        {
        }
        /**
         * Checks if trigger has been stopped
         *
         * @return bool
         */
        public function isStopped() : bool
        {
        }
        /***********************************
         *        DEPRECATED METHODS
         ***********************************/
        /**
         * All triggers can be considered postponed as of v8.0.0
         * as they are processed on the `shutdown` hook.
         *
         * @param string $tag action hook.
         * @param int $priority action priority, default 10.
         * @param int $acceptedArgs how many args the action accepts, default 1.
         * @return void
         * @since 6.2.0 Action cannot be postponed if background processing is active.
         * @since 8.0.0 Deprecated
         * @since 6.1.0 The postponed action have own method.
         */
        public function postponeAction($tag, $priority = 10, $acceptedArgs = 1)
        {
        }
        /**
         * All triggers can be considered postponed as of v8.0.0
         * as they are processed on the `shutdown` hook.
         *
         * @return bool
         * @since 8.0.0 Deprecated
         */
        public function isPostponed()
        {
        }
        /**
         * Checks if this trigger has background processing active.
         *
         * @return bool
         * @since 8.0.0 Deprecated
         * @since 7.2.3
         */
        public function hasBackgroundProcessingEnabled()
        {
        }
        /**
         * Gets action arguments.
         *
         * @return array<mixed>
         * @since 8.0.0 Deprecated
         * @since 6.2.0
         */
        public function getActionArgs()
        {
        }
        /**
         * Always returns an empty array
         *
         * @return array<mixed>
         * @since 8.0.0 Deprecated
         * @since  6.3.0
         */
        public function getCache()
        {
        }
        /**
         * Doesn't do anything
         *
         * @param array<mixed> $cache Array with cached vars.
         * @return $this
         * @since  6.3.0
         * @since 8.0.0 Deprecated
         */
        public function setCache($cache)
        {
        }
        /**
         * Always returns the $default value
         *
         * @param string $key Cache key.
         * @param mixed $default Default value.
         * @return mixed
         * @since  8.0.0 Deprecated
         * @since  6.3.0
         */
        public function cache($key, $default = '')
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Post {
    /**
     * Post trigger class
     */
    abstract class PostTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Post Type slug
         *
         * @var string
         */
        public $postType;
        /**
         * Post author user object
         *
         * @var \WP_User|false
         */
        public $author;
        /**
         * Post last editor user object
         *
         * @var \WP_User|false
         */
        public $lastEditor;
        /**
         * Post in subject.
         *
         * @var \WP_Post
         */
        public $post;
        /**
         * Constructor
         *
         * @param array<mixed> $params trigger configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * Lazy loads group name
         *
         * @return string|null Group name
         */
        public function getGroup()
        {
        }
        /**
         * Gets Post Type slug
         *
         * @return string Post Type slug
         */
        public function getPostType() : string
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
        /**
         * Gets the value of deprecated properties.
         *
         * @param   string  $property
         * @return  mixed
         */
        public function __get($property)
        {
        }
    }
    /**
     * Post approved trigger class. Approved means published after review.
     */
    class PostApproved extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post approving user object
         *
         * @var \WP_User|false
         */
        public $approvingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($post)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post published privately trigger class
     */
    class PostPublishedPrivately extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Status name of published post
         *
         * @var string
         */
        protected static $publishStatus = 'private';
        /**
         * Post publishing user object
         *
         * @var \WP_User|false
         */
        public $publishingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $newStatus New post status.
         * @param string $oldStatus Old post status.
         * @param \WP_Post $post Post object.
         * @return false|void
         */
        public function context($newStatus, $oldStatus, $post)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post updated trigger class
     */
    class PostUpdated extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post updating user object
         *
         * @var \WP_User|false
         */
        public $updatingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $postId Post ID.
         * @param \WP_Post $post Post object.
         * @param \WP_Post $postBefore Post before object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($postId, $post, $postBefore)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post added trigger class
     */
    class PostAdded extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post publishing user object
         *
         * @var \WP_User|false
         */
        public $publishingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         * Return `false` if you want to abort the trigger execution
         *
         * @param int $postId Post ID.
         * @param \WP_Post $post Post object.
         * @param bool $update Whether this is an existing post being updated or not.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($postId, $post, $update)
        {
        }
    }
    /**
     * Post published trigger class
     */
    class PostPublished extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Status name of published post
         *
         * @var string
         */
        protected static $publishStatus = 'publish';
        /**
         * Post publishing user object
         *
         * @var \WP_User|false
         */
        public $publishingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $newStatus New post status.
         * @param string $oldStatus Old post status.
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($newStatus, $oldStatus, $post)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post trashed trigger class
     */
    class PostTrashed extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post trashing user object
         *
         * @var \WP_User|false
         */
        public $trashingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $postId Post ID.
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($postId, $post)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post sent for review trigger class
     */
    class PostScheduled extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post scheduling user object
         *
         * @var \WP_User|false
         */
        public $schedulingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $newStatus New post status.
         * @param string $oldStatus Old post status.
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($newStatus, $oldStatus, $post)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Post drafted trigger class
     */
    class PostDrafted extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Post publishing user object
         *
         * @var \WP_User|false
         */
        public $publishingUser;
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $newStatus New post status.
         * @param string $oldStatus Old post status.
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($newStatus, $oldStatus, $post)
        {
        }
    }
    /**
     * Post sent for review trigger class
     */
    class PostPending extends \BracketSpace\Notification\Repository\Trigger\Post\PostTrigger
    {
        /**
         * Constructor
         *
         * @param string $postType optional, default: post.
         */
        public function __construct($postType = 'post')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $newStatus New post status.
         * @param string $oldStatus Old post status.
         * @param \WP_Post $post Post object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($newStatus, $oldStatus, $post)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Privacy {
    /**
     * Privacy trigger abstract class
     */
    abstract class PrivacyTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * User request object
         *
         * @var \WP_User_Request
         */
        public $request;
        /**
         * Request user object
         *
         * @var \WP_User|false
         */
        public $userObject;
        /**
         * Data operation date and time
         *
         * @var string
         */
        public $dataOperationTime;
        /**
         * Constructor
         *
         * @param string $slug Slug.
         * @param string $name Name.
         */
        public function __construct($slug, $name)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Data exported trigger class
     */
    class DataExported extends \BracketSpace\Notification\Repository\Trigger\Privacy\PrivacyTrigger
    {
        /**
         * Archive package path
         *
         * @var string
         */
        public $archivePath;
        /**
         * Archive package URL
         *
         * @var string
         */
        public $archiveUrl;
        /**
         * HTML report path
         *
         * @var string
         */
        public $htmlReportPath;
        /**
         * JSON report pathname
         *
         * @var string
         */
        public $jsonReportPathname;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $archivePathname Archive pathname.
         * @param string $archiveUrl Archive url.
         * @param string $htmlReportPathname Html report pathname.
         * @param int $requestId Request id.
         * @param string $jsonReportPathname Json report pathname.
         */
        public function context($archivePathname, $archiveUrl, $htmlReportPathname, $requestId, $jsonReportPathname = null)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Data export request trigger class
     */
    class DataExportRequest extends \BracketSpace\Notification\Repository\Trigger\Privacy\PrivacyTrigger
    {
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $requestId Request id.
         */
        public function context($requestId)
        {
        }
    }
    /**
     * Data erased  trigger class
     */
    class DataErased extends \BracketSpace\Notification\Repository\Trigger\Privacy\PrivacyTrigger
    {
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $requestId Request id.
         */
        public function context($requestId)
        {
        }
    }
    /**
     * Data erase request trigger class
     */
    class DataEraseRequest extends \BracketSpace\Notification\Repository\Trigger\Privacy\PrivacyTrigger
    {
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $requestId Request id.
         */
        public function context($requestId)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\WordPress {
    /**
     * Site Email Change Request
     */
    class EmailChangeRequest extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * User object
         *
         * @var \WP_User
         */
        public $userObject;
        /**
         * Old admin email
         *
         * @var string
         */
        public $oldAdminEmail;
        /**
         * New admin email
         *
         * @var string
         */
        public $newAdminEmail;
        /**
         * Site URL.
         *
         * @var  string
         */
        public $siteUrl;
        /**
         * Confirmation URL.
         *
         * @var string
         */
        public $confirmationUrl;
        /**
         * Email change timestamp
         *
         * @var int
         */
        public $emailChangeDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param mixed $_unused Unused.
         * @param string $newEmail New email value.
         *
         * @return mixed
         * @since 8.0.0
         */
        public function context($_unused, $newEmail)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         * @since 8.0.0
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Site email changed trigger
     */
    class EmailChanged extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * User object
         *
         * @var \WP_User
         */
        public $userObject;
        /**
         * Old admin email
         *
         * @var string
         */
        public $oldAdminEmail;
        /**
         * New admin email
         *
         * @var string
         */
        public $newAdminEmail;
        /**
         * Site URL.
         *
         * @var  string
         */
        public $siteUrl;
        /**
         * Email changed timestamp
         *
         * @var int
         */
        public $emailChangedDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $oldEmail Old email value.
         * @param string $newEmail New email value.
         *
         * @return mixed
         */
        public function context($oldEmail, $newEmail)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Updated WordPress trigger class.
     */
    class Updated extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * WordPress previous version
         *
         * @var string
         */
        public $previousVersion;
        /**
         * WordPress new version
         *
         * @var string
         */
        public $newVersion;
        /**
         * WordPress update date and time
         *
         * @var string
         */
        public $wordpressUpdateDateTime;
        /**
         * Constructor.
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param string $newVersion New WordPress version number.
         * @return void|false
         */
        public function context($newVersion)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * WordPress Updates Available trigger class
     */
    class UpdatesAvailable extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Update types
         *
         * @var array<mixed>
         */
        public $updateTypes;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @return mixed
         */
        public function context()
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
        /**
         * Checks if specific updates are available
         *
         * @param string $updateType update type, core | plugin | theme.
         * @return bool
         * @since  5.1.5
         */
        public function hasUpdates($updateType)
        {
        }
        /**
         * Gets specific update type title
         *
         * @param string $updateType update type, core | plugin | theme.
         * @return string
         * @since  5.1.5
         */
        public function getListTitle($updateType)
        {
        }
        /**
         * Gets core updates list
         *
         * @return string
         * @since  5.1.5
         */
        public function getCoreUpdatesList()
        {
        }
        /**
         * Gets plugin updates list
         *
         * @return string
         * @since  5.1.5
         */
        public function getPluginUpdatesList()
        {
        }
        /**
         * Gets theme updates list
         *
         * @return string
         * @since  5.1.5
         */
        public function getThemeUpdatesList()
        {
        }
        /**
         * Gets updates count
         *
         * @param string $updateType optional, update type, core | plugin | theme | all, default: all.
         * @return int
         * @since  5.1.5
         */
        public function getUpdatesCount($updateType = 'all')
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Comment {
    /**
     * Comment trigger class
     */
    abstract class CommentTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Comment Type slug
         *
         * @var string
         */
        public $commentType;
        /**
         * Comment object
         *
         * @var \WP_Comment
         */
        public $comment;
        /**
         * Comment author user object
         *
         * @var \stdClass
         */
        public $userObject;
        /**
         * Post object
         *
         * @var \WP_Post
         */
        public $post;
        /**
         * Post Type slug
         *
         * @var string
         */
        public $postType;
        /**
         * Post creation date and time
         *
         * @var int|false
         */
        public $postCreationDatetime;
        /**
         * Post modification date and time
         *
         * @var int|false
         */
        public $postModificationDatetime;
        /**
         * Comment date and time
         *
         * @var int|false
         */
        public $commentDatetime;
        /**
         * Post author user object
         *
         * @var \WP_User
         */
        public $postAuthor;
        /**
         * Constructor
         *
         * @param array<mixed> $params trigger configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * Sets trigger's context
         *
         * @return void
         */
        public function assignProperties()
        {
        }
        /**
         * Check if comment is correct type
         *
         * @param mixed $comment Comment object or Comment ID.
         * @return bool
         */
        public function isCorrectType($comment)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Comment spammed trigger class
     */
    class CommentSpammed extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $commentId Comment ID.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentId, $comment)
        {
        }
    }
    /**
     * Comment replied trigger class
     */
    class CommentReplied extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Parent comment object
         *
         * @var \WP_Comment|null
         */
        public $parentComment;
        /**
         * Parent comment user object
         *
         * @var \stdClass
         */
        public $parentCommentUserObject;
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $commentNewStatus New comment status.
         * @param string $commentOldStatus Old comment status.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentNewStatus, $commentOldStatus, $comment)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Comment added trigger class
     */
    class CommentAdded extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $commentId Comment ID.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentId, $comment)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Comment published trigger class
     */
    class CommentPublished extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($comment)
        {
        }
    }
    /**
     * Comment trashed trigger class
     */
    class CommentTrashed extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $commentId Comment ID.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentId, $comment)
        {
        }
    }
    /**
     * Comment unapproved trigger class
     */
    class CommentUnapproved extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $commentNewStatus New comment status.
         * @param string $commentOldStatus Old comment status.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentNewStatus, $commentOldStatus, $comment)
        {
        }
    }
    /**
     * Comment added trigger class
     */
    class CommentApproved extends \BracketSpace\Notification\Repository\Trigger\Comment\CommentTrigger
    {
        /**
         * Constructor
         *
         * @param string $commentType optional, default: comment.
         */
        public function __construct($commentType = 'comment')
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $commentNewStatus New comment status.
         * @param string $commentOldStatus Old comment status.
         * @param object $comment Comment object.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($commentNewStatus, $commentOldStatus, $comment)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Plugin {
    /**
     * Plugin trigger class
     */
    abstract class PluginTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Plugin details array
         *
         * @var array<mixed>
         */
        public $plugin;
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Activated plugin trigger class
     */
    class Activated extends \BracketSpace\Notification\Repository\Trigger\Plugin\PluginTrigger
    {
        /**
         * Plugin activation date and time
         *
         * @var string
         */
        public $pluginActivationDateTime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Trigger action
         *
         * @param string $pluginRelPath Plugin path.
         * @return void
         */
        public function context($pluginRelPath)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Deactivated plugin trigger class
     */
    class Deactivated extends \BracketSpace\Notification\Repository\Trigger\Plugin\PluginTrigger
    {
        /**
         * Plugin deactivation date and time
         *
         * @var string
         */
        public $pluginDeactivationDateTime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Trigger action
         *
         * @param string $pluginRelPath Plugin path.
         * @return void
         */
        public function context($pluginRelPath)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Removed plugin trigger class.
     */
    class Removed extends \BracketSpace\Notification\Repository\Trigger\Plugin\PluginTrigger
    {
        /**
         * Plugin deletion date and time
         *
         * @var string
         */
        public $pluginDeletionDateTime;
        /**
         * Constructor.
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param string $pluginRelPath Plugin path.
         * @return mixed void or false if no notifications should be sent.
         */
        public function context($pluginRelPath)
        {
        }
        /**
         * Registers attached merge tags.
         *
         * @return void.
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Installed plugin trigger class.
     */
    class Installed extends \BracketSpace\Notification\Repository\Trigger\Plugin\PluginTrigger
    {
        /**
         * Plugin installation date and time
         *
         * @var string
         */
        public $pluginInstallationDateTime;
        /**
         * Constructor.
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param \Plugin_Upgrader $upgrader Plugin_Upgrader class.
         * @param array<mixed> $data Update data information.
         * @return mixed                      Void or false if no notifications should be sent.
         */
        public function context($upgrader, $data)
        {
        }
        /**
         * Registers attached merge tags.
         *
         * @return void.
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Updated plugin trigger class.
     */
    class Updated extends \BracketSpace\Notification\Repository\Trigger\Plugin\PluginTrigger
    {
        /**
         * Plugin previous version
         *
         * @var string
         */
        public $previousVersion;
        /**
         * Plugin update date and time
         *
         * @var string
         */
        public $pluginUpdateDateTime;
        /**
         * Constructor.
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param \Plugin_Upgrader $upgrader Plugin_Upgrader class.
         * @param array<mixed> $data Update data information.
         * @return void|false
         */
        public function context($upgrader, $data)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\User {
    /**
     * User trigger class
     */
    abstract class UserTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * User ID
         *
         * @var int
         */
        public $userId;
        /**
         * User object
         *
         * @var \WP_User
         */
        public $userObject;
        /**
         * User registration date and time
         *
         * @var int|false
         */
        public $userRegisteredDatetime;
        /**
         * Constructor
         *
         * @param string $slug $params trigger slug.
         * @param string $name $params trigger name.
         */
        public function __construct($slug, $name)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User profile updated trigger class
     */
    class UserProfileUpdated extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * User profile update date and time
         *
         * @var int|false
         */
        public $userProfileUpdatedDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @return void
         */
        public function context($userId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User login failed trigger class
     */
    class UserLoginFailed extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User login failure date and time
         *
         * @var int|false
         */
        public $userLoginFailedDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $username username.
         * @return mixed
         */
        public function context($username)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User logout trigger class
     */
    class UserLogout extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * User logout date and time
         *
         * @var int|false
         */
        public $userLogoutDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @return void
         */
        public function context($userId = 0)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User password changed trigger class
     */
    class UserPasswordChanged extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * Password change date and time
         *
         * @var int|false
         */
        public $passwordChangeDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param object $user User object.
         * @return void
         */
        public function context($user)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User role changed trigger class
     */
    class UserRoleChanged extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * New role
         *
         * @var string
         */
        public $newRole;
        /**
         * Old role
         *
         * @var string
         */
        public $oldRole;
        /**
         * User role change date and time
         *
         * @var int|false
         */
        public $userRoleChangeDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @param string $role User new role.
         * @param array<mixed> $oldRoles User previous roles.
         * @return mixed
         */
        public function context($userId, $role, $oldRoles)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User registered trigger class
     */
    class UserRegistered extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @return void
         */
        public function context($userId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
        /**
         * Gets password reset key
         *
         * @return string
         * @since  5.1.5
         */
        public function getPasswordResetKey()
        {
        }
    }
    /**
     * User deleted trigger class
     */
    class UserDeleted extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * User deletion date and time
         *
         * @var int|false
         */
        public $userDeletedDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @return void
         */
        public function context($userId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User email changed class
     */
    class UserEmailChanged extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * Old user email
         *
         * @var string
         */
        public $oldUserEmail;
        /**
         * New user email
         *
         * @var string
         */
        public $newUserEmail;
        /**
         * Site URL.
         *
         * @var  string
         */
        public $siteUrl;
        /**
         * Email changed timestamp
         *
         * @var int
         */
        public $emailChangedDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId Updated user ID.
         * @param \WP_User $oldUser Old user instance.
         * @param array<string, mixed> $newData New user data.
         * @return false|void
         */
        public function context($userId, $oldUser, $newData)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User login trigger class
     */
    class UserLogin extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * User meta data
         *
         * @var array<mixed>
         */
        public $userMeta;
        /**
         * User login date and time
         *
         * @var int|false
         */
        public $userLoggedInDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $userLogin Logged in user login.
         * @param object $user User object.
         * @return void
         */
        public function context($userLogin, $user)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User Email Change Request
     */
    class UserEmailChangeRequest extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * Old user email
         *
         * @var string
         */
        public $oldUserEmail;
        /**
         * New user email
         *
         * @var string
         */
        public $newUserEmail;
        /**
         * Site URL.
         *
         * @var  string
         */
        public $siteUrl;
        /**
         * Confirmation URL.
         *
         * @var string
         */
        public $confirmationUrl;
        /**
         * Email change timestamp
         *
         * @var int
         */
        public $emailChangeDatetime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $userId User ID.
         * @return mixed
         * @since 8.0.0
         */
        public function context($userId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         * @since 8.0.0
         */
        public function mergeTags()
        {
        }
    }
    /**
     * User password change requested trigger class
     */
    class UserPasswordResetRequest extends \BracketSpace\Notification\Repository\Trigger\User\UserTrigger
    {
        /**
         * Password reset request date and time
         *
         * @var int|false
         */
        public $passwordResetRequestDatetime;
        /**
         * Password reset key
         *
         * @var string
         */
        public $passwordResetKey;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param string $username username.
         * @param string $resetKey password reset key.
         * @return mixed
         */
        public function context($username, $resetKey)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Theme {
    /**
     * Theme trigger class
     */
    abstract class ThemeTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Theme object
         *
         * @var \WP_Theme
         */
        public $theme;
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Switched theme trigger class
     */
    class Switched extends \BracketSpace\Notification\Repository\Trigger\Theme\ThemeTrigger
    {
        /**
         * Old theme object
         *
         * @var \WP_Theme
         */
        public $oldTheme;
        /**
         * Theme switch date and time
         *
         * @var string
         */
        public $themeSwitchDateTime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param string $name Name of the new theme.
         * @param \WP_Theme $theme Instance of the new theme.
         * @param \WP_Theme $oldTheme Instance of the old theme.
         * @return mixed                Void or false if no notifications should be sent.
         */
        public function context($name, $theme, $oldTheme)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Installed theme trigger class
     */
    class Installed extends \BracketSpace\Notification\Repository\Trigger\Theme\ThemeTrigger
    {
        /**
         * Theme installation date and time
         *
         * @var string
         */
        public $themeInstallationDateTime;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param \Theme_Upgrader $upgrader Theme_Upgrader class.
         * @param array<mixed> $data Update data information.
         * @return mixed                     Void or false if no notifications should be sent.
         */
        public function context($upgrader, $data)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Updated theme trigger class
     */
    class Updated extends \BracketSpace\Notification\Repository\Trigger\Theme\ThemeTrigger
    {
        /**
         * Theme update date and time
         *
         * @var string
         */
        public $themeUpdateDateTime;
        /**
         * Theme previous version
         *
         * @var string
         */
        public $themePreviousVersion;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Trigger action.
         *
         * @param \Theme_Upgrader $upgrader Theme_Upgrader class.
         * @param array<mixed> $data Update data information.
         * @return mixed                     Void or false if no notifications should be sent.
         */
        public function context($upgrader, $data)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Taxonomy {
    /**
     * Taxonomy trigger class
     */
    abstract class TermTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Taxonomy slug
         *
         * @var \WP_Taxonomy|null
         */
        public $taxonomy;
        /**
         * Term object
         *
         * @var \WP_Term
         */
        public $term;
        /**
         * Term permalink
         *
         * @var string
         */
        public $termPermalink = '';
        /**
         * Constructor
         *
         * @param array<mixed> $params trigger configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * Lazy loads group name
         *
         * @return string|null Group name
         */
        public function getGroup()
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Taxonomy updated trigger class
     */
    class TermUpdated extends \BracketSpace\Notification\Repository\Trigger\Taxonomy\TermTrigger
    {
        /**
         * Term modification date and time
         *
         * @var string
         */
        public $termModificationDatetime;
        /**
         * Constructor
         *
         * @param string $taxonomy optional, default: category.
         */
        public function __construct($taxonomy = 'category')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $termId Term ID used only due to lack of taxonomy param.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($termId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Taxonomy term added trigger class
     */
    class TermAdded extends \BracketSpace\Notification\Repository\Trigger\Taxonomy\TermTrigger
    {
        /**
         * Term creation date and time
         *
         * @var string
         */
        public $termCreationDatetime;
        /**
         * Constructor
         *
         * @param string $taxonomy optional default category.
         */
        public function __construct($taxonomy = 'category')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         * Return `false` if you want to abort the trigger execution
         *
         * @param int $termId Term ID.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($termId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Taxonomy term deleted trigger class
     */
    class TermDeleted extends \BracketSpace\Notification\Repository\Trigger\Taxonomy\TermTrigger
    {
        /**
         * Term deletion date and time
         *
         * @var string
         */
        public $termDeletionDatetime;
        /**
         * Constructor
         *
         * @param string $taxonomy optional, default: category.
         */
        public function __construct($taxonomy = 'category')
        {
        }
        /**
         * Lazy loads the name
         *
         * @return string name
         */
        public function getName() : string
        {
        }
        /**
         * Lazy loads the description
         *
         * @return string description
         */
        public function getDescription() : string
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $termId Term ID.
         * @return mixed void or false if no notifications should be sent
         */
        public function context($termId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Trigger\Media {
    /**
     * Media trigger class
     */
    abstract class MediaTrigger extends \BracketSpace\Notification\Repository\Trigger\BaseTrigger
    {
        /**
         * Attachment post object
         *
         * @var \WP_Post
         */
        public $attachment;
        /**
         * User ID
         *
         * @var int
         */
        public $userId;
        /**
         * User object
         *
         * @var \WP_User
         */
        public $userObject;
        /**
         * Attachment creation date and time
         *
         * @var int|false
         */
        public $attachmentCreationDate;
        /**
         * Constructor
         *
         * @param string $slug $params trigger slug.
         * @param string $name $params trigger name.
         */
        public function __construct($slug, $name)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Media added trigger class
     */
    class MediaUpdated extends \BracketSpace\Notification\Repository\Trigger\Media\MediaTrigger
    {
        /**
         * Updating user object
         *
         * @var \WP_User
         */
        public $updatingUser;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $attachmentId Attachment Post ID.
         * @return void
         */
        public function context($attachmentId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Media trashed trigger class
     */
    class MediaTrashed extends \BracketSpace\Notification\Repository\Trigger\Media\MediaTrigger
    {
        /**
         * Trashing user object
         *
         * @var \WP_User
         */
        public $trashingUser;
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $attachmentId Attachment Post ID.
         * @return void
         */
        public function context($attachmentId)
        {
        }
        /**
         * Registers attached merge tags
         *
         * @return void
         */
        public function mergeTags()
        {
        }
    }
    /**
     * Media added trigger class
     */
    class MediaAdded extends \BracketSpace\Notification\Repository\Trigger\Media\MediaTrigger
    {
        /**
         * Constructor
         */
        public function __construct()
        {
        }
        /**
         * Sets trigger's context
         *
         * @param int $attachmentId Attachment Post ID.
         * @return void
         */
        public function context($attachmentId)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository {
    /**
     * Recipient Repository.
     */
    class RecipientRepository
    {
        /**
         * Webhook recipient types.
         *
         * @var array<string,string>
         */
        public static $webhookRecipientTypes = ['post' => 'POST', 'get' => 'GET', 'put' => 'PUT', 'delete' => 'DELETE', 'patch' => 'PATCH'];
        /**
         * @return void
         */
        public static function register()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Convertable interface
     */
    interface Convertable
    {
        /**
         * Creates Notification from a specific representation
         *
         * @since [Next]
         * @param string|array<mixed,mixed> $data The notification representation
         * @return Notification
         */
        public function from($data) : \BracketSpace\Notification\Core\Notification;
        /**
         * Converts the notification to another type of representation
         *
         * @since [Next]
         * @param Notification $notification Notification instance
         * @param array<string|int,mixed> $config The additional configuration of the converter
         * @return mixed
         */
        public function to(\BracketSpace\Notification\Core\Notification $notification, array $config = []);
    }
}
namespace BracketSpace\Notification\Repository\Converter {
    /**
     * Array Converter class
     *
     * @since [Next]
     */
    class ArrayConverter implements \BracketSpace\Notification\Interfaces\Convertable
    {
        /**
         * Creates Notification from a specific representation
         *
         * @filter notification/from/array
         *
         * @since [Next]
         * @param NotificationUnconvertedData $data The notification representation
         * @return Notification
         */
        public function from($data) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * Converts the notification to another type of representation
         *
         * @filter notification/to/array
         *
         * @since [Next]
         * @param Notification $notification Notification instance
         * @param array<string|int,mixed> $config The additional configuration of the converter
         * @return NotificationAsArray
         */
        public function to(\BracketSpace\Notification\Core\Notification $notification, array $config = [])
        {
        }
    }
    /**
     * JSON Converter class
     *
     * @since [Next]
     */
    class JsonConverter implements \BracketSpace\Notification\Interfaces\Convertable
    {
        /**
         * Creates Notification from a specific representation
         *
         * @filter notification/from/json
         *
         * @since [Next]
         * @param string $data The notification representation
         * @return Notification
         */
        public function from($data) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * Converts the notification to another type of representation
         *
         * @filter notification/to/json
         *
         * @since [Next]
         * @param Notification $notification Notification instance
         * @param array<string|int,mixed> $config The additional configuration of the converter
         * @return mixed
         */
        public function to(\BracketSpace\Notification\Core\Notification $notification, array $config = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Recipient {
    /**
     * Email recipient
     */
    class Email extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @since 5.0.0
         */
        public function __construct()
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
    /**
     * User recipient
     */
    class User extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @since 5.0.0
         * @param array<mixed> $params recipient configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
    /**
     * Role recipient
     */
    class Role extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @since 5.0.0
         * @param array<mixed> $params recipient configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
    /**
     * User ID recipient
     */
    class UserID extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @since 5.0.0
         * @param array<mixed> $params recipient configuration params.
         */
        public function __construct($params = [])
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
    /**
     * Administrator recipient
     */
    class Administrator extends \BracketSpace\Notification\Repository\Recipient\BaseRecipient
    {
        /**
         * Recipient constructor
         *
         * @since 5.0.0
         */
        public function __construct()
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param string $value raw value saved by the user.
         * @return array<mixed>         array of resolved values
         */
        public function parseValue($value = '')
        {
        }
        /**
         * {@inheritdoc}
         *
         * @return object
         */
        public function input()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Fillable interface
     */
    interface Fillable
    {
        /**
         * Gets field value
         *
         * @return mixed
         */
        public function getValue();
        /**
         * Sets field value
         *
         * @param mixed $value value from DB.
         * @return void
         */
        public function setValue($value);
        /**
         * Gets field section name
         *
         * @return string
         */
        public function getSection();
        /**
         * Sets field section name
         *
         * @param string $value assigned value
         * @return void
         */
        public function setSection($value);
        /**
         * Gets field name
         *
         * @return string
         */
        public function getName();
        /**
         * Gets raw field name
         *
         * @return string
         */
        public function getRawName();
        /**
         * Gets field label
         *
         * @return string
         */
        public function getLabel();
        /**
         * Gets field ID
         *
         * @return string
         */
        public function getId();
        /**
         * Gets field description
         *
         * @return string
         */
        public function getDescription();
        /**
         * Returns the additional field's css classes
         *
         * @return string
         */
        public function cssClass();
        /**
         * Checks if field should be resolved with merge tags
         *
         * @return bool
         */
        public function isResolvable();
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value);
    }
}
namespace BracketSpace\Notification\Repository\Field {
    /**
     * Field abstract class
     */
    abstract class BaseField implements \BracketSpace\Notification\Interfaces\Fillable
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Field unique ID
         *
         * @var string
         */
        public $id;
        /**
         * Field value
         *
         * @var mixed
         */
        public $value;
        /**
         * Field label
         *
         * @var mixed
         */
        protected $label;
        /**
         * Field name
         *
         * @var mixed
         */
        protected $name;
        /**
         * Short description
         * Limited HTML support
         *
         * @var string
         */
        protected $description = '';
        /**
         * If field is resolvable with merge tags
         * Default: true
         *
         * @var bool
         */
        protected $resolvable = true;
        /**
         * Field section name
         *
         * @var string
         */
        protected $section = '';
        /**
         * If field is disabled
         *
         * @var bool
         */
        public $disabled = false;
        /**
         * Additional css classes for field
         *
         * @var string
         */
        public $cssClass = 'widefat notification-field ';
        // space here on purpose.
        /**
         * If field can be used multiple times in Section Repeater row
         *
         * @var bool
         */
        public $multipleSection = false;
        /**
         * Field type used in HTML attribute.
         *
         * @var string
         */
        public $fieldTypeHtml = '';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field data
         *
         * @param string $param Field data name.
         * @return  array
         * @since 7.0.0
         */
        public function __get($param)
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public abstract function field();
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public abstract function sanitize($value);
        /**
         * Gets description
         *
         * @return string description
         */
        public function getDescription()
        {
        }
        /**
         * Gets field value
         *
         * @return mixed
         */
        public function getValue()
        {
        }
        /**
         * Sets field value
         *
         * @param mixed $value value from DB.
         * @return void
         */
        public function setValue($value)
        {
        }
        /**
         * Gets field section name
         *
         * @return string
         */
        public function getSection()
        {
        }
        /**
         * Sets field section name
         *
         * @param string $value assigned value
         * @return void
         */
        public function setSection($value)
        {
        }
        /**
         * Gets field name
         *
         * @return string
         */
        public function getName()
        {
        }
        /**
         * Gets field raw name
         *
         * @return string
         */
        public function getRawName()
        {
        }
        /**
         * Gets field label
         *
         * @return string
         */
        public function getLabel()
        {
        }
        /**
         * Gets field ID
         *
         * @return string
         */
        public function getId()
        {
        }
        /**
         * Checks if field should be resolved with merge tags
         *
         * @return bool
         */
        public function isResolvable()
        {
        }
        /**
         * Checks if field is disabled
         *
         * @return bool
         */
        public function isDisabled()
        {
        }
        /**
         * Returns the disable HTML tag if field is disabled
         *
         * @return string
         */
        public function maybeDisable()
        {
        }
        /**
         * Returns the additional field's css classes
         *
         * @return string
         */
        public function cssClass()
        {
        }
        /**
         * Returns rest API error message
         *
         * @return string
         * @since 7.1.0
         */
        public function restApiError()
        {
        }
    }
    /**
     * Repeater field class
     */
    class SectionRepeater extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Current repeater row
         *
         * @var int
         */
        protected $currentRow = 0;
        /**
         * Fields to repeat
         *
         * @var array<\BracketSpace\Notification\Abstracts\Field>
         */
        public $fields = [];
        /**
         * Add new button label
         *
         * @var string
         */
        protected $addButtonLabel = '';
        /**
         * Data attributes
         *
         * @var array<mixed>
         */
        protected $dataAttr = [];
        /**
         * Row headers
         *
         * @var array<mixed>
         */
        protected $headers = [];
        /**
         * If table is sortable
         *
         * @var bool
         */
        protected $sortable = true;
        /**
         * Repeater field type
         *
         * @var string
         */
        public $fieldType = 'section-repeater';
        /**
         * Carrier object
         *
         * @var \BracketSpace\Notification\Interfaces\Sendable
         */
        protected $carrier;
        /**
         * Sections
         *
         * @var array<mixed>
         */
        public $sections = [];
        /**
         * Section labels
         *
         * @var array<mixed>
         */
        protected $sectionLabels = [];
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Prints repeater row
         *
         * @return string          row HTML
         * @since  5.0.0
         */
        public function row()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
        /**
         * Returns the additional field's css classes
         *
         * @return string
         */
        public function cssClass()
        {
        }
    }
    /**
     * Editor field class
     */
    class CodeEditorField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Editor settings
         *
         * @see https://codex.wordpress.org/Function_Reference/wp_editor#Arguments
         * @var string
         */
        protected $settings = 'text';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * The code is not sanitized
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Repeater field class
     */
    class RepeaterField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Current repeater row
         *
         * @var int
         */
        protected $currentRow = 0;
        /**
         * Fields to repeat
         *
         * @var array<\BracketSpace\Notification\Abstracts\Field>
         */
        public $fields = [];
        /**
         * Add new button label
         *
         * @var string
         */
        protected $addButtonLabel = '';
        /**
         * Data attributes
         *
         * @var array<mixed>
         */
        protected $dataAttr = [];
        /**
         * Row headers
         *
         * @var array<mixed>
         */
        protected $headers = [];
        /**
         * If table is sortable
         *
         * @var bool
         */
        protected $sortable = true;
        /**
         * Repeater field type
         *
         * @var string
         */
        public $fieldType = 'repeater';
        /**
         * Carrier object
         *
         * @var \BracketSpace\Notification\Interfaces\Sendable
         */
        protected $carrier;
        /**
         * If the global description in the header should be printed
         *
         * @var bool
         */
        public $printHeaderDescription = true;
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Prints repeater row
         *
         * @return string          row HTML
         * @since  5.0.0
         */
        public function row()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
        /**
         * Returns the additional field's css classes
         *
         * @return string
         */
        public function cssClass()
        {
        }
    }
    /**
     * Input field class
     */
    class InputField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Field type
         * possible values are valid HTML5 types except file or checkbox
         *
         * @var string
         */
        public $type = 'text';
        /**
         * Field placeholder
         *
         * @var string
         */
        protected $placeholder = '';
        /**
         * Field attributes
         *
         * @var string
         */
        protected $atts = '';
        /**
         * Allow for line breaks while sanitizing
         *
         * @since 6.3.1
         * @var bool
         */
        protected $allowLinebreaks = false;
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 6.3.1 Allow for whitespace characters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Color Picker field class
     */
    class ColorPickerField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Image field class
     */
    class ImageField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param string $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Input field class
     */
    class MessageField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Message
         *
         * @var string
         */
        protected $message = '';
        /**
         * Field type
         *
         * @var string
         */
        protected $type = '';
        /**
         * Field placeholder
         *
         * @var string
         */
        protected $placeholder = '';
        /**
         * Field attributes
         *
         * @var string
         */
        protected $atts = '';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 6.3.1 Allow for whitespace characters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return null
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Recipients field class
     */
    class SectionsField extends \BracketSpace\Notification\Repository\Field\InputField
    {
        /**
         * Possible values
         *
         * @var array<mixed>
         */
        protected $sections = [];
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Prints repeater row
         *
         * @return string          row HTML
         * @since  5.0.0
         */
        public function row()
        {
        }
    }
    /**
     * Recipients field class
     */
    class RecipientsField extends \BracketSpace\Notification\Repository\Field\RepeaterField
    {
        /**
         * If the global description in the header should be printed
         *
         * @var bool
         */
        public $printHeaderDescription = false;
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Prints repeater row
         *
         * @return string
         * @since  5.0.0
         * @since 7.0.0 Added vue template.
         */
        public function row()
        {
        }
    }
    /**
     * Nonce field class
     */
    class NonceField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Nonce key
         *
         * @var string
         */
        protected $nonceKey = '';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Editor field class
     */
    class EditorField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Editor settings
         *
         * @see https://codex.wordpress.org/Function_Reference/wp_editor#Arguments
         * @var string
         */
        protected $settings = 'text';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Checkbox field class
     */
    class CheckboxField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Checkbox label text
         * Default: Enable
         *
         * @var string
         */
        protected $checkboxLabel = '';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Select field class
     */
    class SelectField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Field options
         * value => label array
         *
         * @var array<mixed>
         */
        protected $options = [];
        /**
         * Class for pretty select
         * Will be used by JS to print Selectize input
         *
         * @var string
         */
        protected $pretty = '';
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Textarea field class
     */
    class TextareaField extends \BracketSpace\Notification\Repository\Field\BaseField
    {
        /**
         * Field placeholder
         *
         * @var string
         */
        protected $placeholder = '';
        /**
         * Textarea rows
         *
         * @var int
         */
        protected $rows = 10;
        /**
         * If unfiltered value is allowed
         *
         * @var bool
         */
        protected $allowedUnfiltered = false;
        /**
         * Field constructor
         *
         * @param array<mixed> $params field configuration parameters.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Returns field HTML
         *
         * @return string html
         */
        public function field()
        {
        }
        /**
         * Sanitizes the value sent by user
         *
         * @param mixed $value value to sanitize.
         * @return mixed        sanitized value
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Taggable interface
     */
    interface Taggable extends \BracketSpace\Notification\Interfaces\Nameable
    {
        /**
         * Resolves the merge tag value
         *
         * @return mixed
         */
        public function resolve();
        /**
         * Gets merge tag resolved value
         *
         * @return mixed
         */
        public function getValue();
        /**
         * Cleans merge tag value
         *
         * @return void
         */
        public function cleanValue();
        /**
         * Checks if merge tag is already resolved
         *
         * @return bool
         */
        public function isResolved();
        /**
         * Gets value type
         *
         * @return string
         */
        public function getValueType();
        /**
         * Sets trigger object
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return $this|void
         */
        public function setTrigger(\BracketSpace\Notification\Interfaces\Triggerable $trigger);
        /**
         * Gets group
         *
         * @return string|null Group name
         */
        public function getGroup();
        /**
         * Sets group
         *
         * @param string $group Group name.
         * @return $this
         */
        public function setGroup(string $group);
    }
}
namespace BracketSpace\Notification\Repository\MergeTag {
    /**
     * MergeTag abstract class
     */
    abstract class BaseMergeTag implements \BracketSpace\Notification\Interfaces\Taggable
    {
        use \BracketSpace\Notification\Traits\ClassUtils;
        use \BracketSpace\Notification\Traits\HasDescription;
        use \BracketSpace\Notification\Traits\HasGroup;
        use \BracketSpace\Notification\Traits\HasName;
        use \BracketSpace\Notification\Traits\HasSlug;
        /**
         * MergeTag resolved value
         *
         * @var mixed
         */
        protected $value;
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType;
        /**
         * Function which resolve the merge tag value
         *
         * @var callable
         */
        protected $resolver;
        /**
         * Resolving status
         *
         * @var bool
         */
        protected $resolved = false;
        /**
         * Trigger object, the Merge tag is assigned to
         *
         * @var \BracketSpace\Notification\Interfaces\Triggerable
         */
        protected $trigger;
        /**
         * If description is an example
         *
         * @var bool
         */
        protected $descriptionExample = false;
        /**
         * If merge tag is hidden
         *
         * @var bool
         */
        protected $hidden = false;
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 7.0.0 The resolver closure context is static.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
        /**
         * Checks if the value is the correct type
         *
         * @param mixed $value tag value.
         * @return bool
         */
        public abstract function validate($value);
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value tag value.
         * @return mixed        sanitized value
         */
        public abstract function sanitize($value);
        /**
         * Resolves the merge tag value
         * It also check if the value is correct type
         * and sanitizes it
         *
         * @return mixed the resolved value
         */
        public function resolve()
        {
        }
        /**
         * Checks if merge tag is already resolved
         *
         * @return bool
         */
        public function isResolved()
        {
        }
        /**
         * Checks if description is an example
         * If yes, there will be displayed additional label and type
         *
         * @return bool
         */
        public function isDescriptionExample()
        {
        }
        /**
         * Gets merge tag resolved value
         *
         * @return mixed
         */
        public function getValue()
        {
        }
        /**
         * Sets trigger object
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @since 5.0.0
         * @return void
         */
        public function setTrigger(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Sets resolver function
         *
         * @param mixed $resolver Resolver, can be either a closure or array or string.
         * @since 5.2.2
         * @return void
         */
        public function setResolver($resolver)
        {
        }
        /**
         * Sets resolver function
         *
         * @param string $triggerPropertyName merge tag trigger property name.
         *
         * @return void
         * @since 8.0.12
         *
         */
        public function setTriggerProp(string $triggerPropertyName)
        {
        }
        /**
         * Get trigger property
         *
         * @return string
         * @since 8.0.12
         *
         */
        public function getTriggerProp() : string
        {
        }
        /**
         * Gets trigger object
         *
         * @return \BracketSpace\Notification\Interfaces\Triggerable|null
         * @since 5.0.0
         */
        public function getTrigger()
        {
        }
        /**
         * Gets value type
         *
         * @return string
         * @since 5.0.0
         */
        public function getValueType()
        {
        }
        /**
         * Checks if merge tag is hidden
         *
         * @return bool
         * @since 5.1.3
         */
        public function isHidden()
        {
        }
        /**
         * Cleans the value
         *
         * @return void
         * @since  5.2.2
         */
        public function cleanValue()
        {
        }
    }
    /**
     * String merge tag class
     */
    class StringTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'string';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Integer merge tag class
     */
    class IntegerTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'integer';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param string $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Email merge tag class
     */
    class EmailTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'string';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Post {
    /**
     * Post type merge tag class
     */
    class PostType extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag {
    /**
     * URL merge tag class
     */
    class UrlTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'string';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Post {
    /**
     * Post thumbnail url merge tag class
     */
    class ThumbnailUrl extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 6.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post title merge tag class
     */
    class PostTitle extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post content merge tag class
     */
    class PostContent extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag {
    /**
     * HTML merge tag class
     */
    class HtmlTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'string';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Post {
    /**
     * Post content HTML merge tag class
     */
    class PostContentHtml extends \BracketSpace\Notification\Repository\MergeTag\HtmlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.4
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post excerpt merge tag class
     */
    class PostExcerpt extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post terms merge tag class
     */
    class PostTerms extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Post Taxonomy Object
         *
         * @var object
         */
        protected $taxonomy;
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.1.3
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post status merge tag class
     */
    class PostStatus extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post ID merge tag class
     */
    class PostID extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Revision link merge tag class
     */
    class RevisionLink extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post slug merge tag class
     */
    class PostSlug extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post featured image id merge tag class
     */
    class FeaturedImageId extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params Merge tag configuration params.
         * @since 6.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post permalink merge tag class
     */
    class PostPermalink extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Post featured image url merge tag class
     */
    class FeaturedImageUrl extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 6.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\DateTime {
    /**
     * DateTime merge tag class
     */
    class DateTime extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since [Next] The automatic property lookup searches for camelCase prop first.
         * @since 7.0.0 Expects the timestamp without an offset.
         *               You can pass timezone argument as well, use GMT if timestamp is with offset.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Time merge tag class
     */
    class Time extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since [Next] The automatic property lookup searches for camelCase prop first.
         * @since 7.0.0 Expects the timestamp without an offset.
         *               You can pass timezone argument as well, use GMT if timestamp is with offset.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Date merge tag class
     */
    class Date extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since [Next] The automatic property lookup searches for camelCase prop first.
         * @since 7.0.0 Expects the timestamp without an offset.
         *               You can pass timezone argument as well, use GMT if timestamp is with offset.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Comment {
    /**
     * Comment action trash URL merge tag class
     */
    class CommentActionTrash extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment action delete URL merge tag class
     */
    class CommentActionDelete extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment author URL merge tag class
     */
    class CommentAuthorUrl extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag {
    /**
     * IP merge tag class
     */
    class IPTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'string';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Comment {
    /**
     * Comment author IP merge tag class
     */
    class CommentAuthorIP extends \BracketSpace\Notification\Repository\MergeTag\IPTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment content merge tag class
     */
    class CommentContent extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment status merge tag class
     */
    class CommentStatus extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment type merge tag class
     */
    class CommentType extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment author user agent tag class
     */
    class CommentAuthorUserAgent extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment action spam URL merge tag class
     */
    class CommentActionSpam extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment is reply merge tag class
     */
    class CommentIsReply extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment action approve URL merge tag class
     */
    class CommentActionApprove extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment content html merge tag class
     */
    class CommentContentHtml extends \BracketSpace\Notification\Repository\MergeTag\HtmlTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Comment ID merge tag class
     */
    class CommentID extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Trigger property to get the comment data from
         *
         * @var string
         */
        protected $commentType = 'comment';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag {
    /**
     * Float merge tag class
     */
    class FloatTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'float';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param string $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Boolean merge tag class
     */
    class BooleanTag extends \BracketSpace\Notification\Repository\MergeTag\BaseMergeTag
    {
        /**
         * MergeTag value type
         *
         * @var string
         */
        protected $valueType = 'boolean';
        /**
         * Check the merge tag value type
         *
         * @param mixed $value value.
         * @return bool
         */
        public function validate($value)
        {
        }
        /**
         * Sanitizes the merge tag value
         *
         * @param mixed $value value.
         * @return mixed
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\User {
    /**
     * User nicename merge tag class
     */
    class UserNicename extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Avatar merge tag class
     */
    class Avatar extends \BracketSpace\Notification\Repository\MergeTag\HtmlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 6.3.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User ID merge tag class
     */
    class UserID extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Avatar Url merge tag class
     */
    class AvatarUrl extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct(array $params = [])
        {
        }
    }
    /**
     * User login merge tag class
     */
    class UserPasswordResetLink extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Trigger property to get the reset key from
         *
         * @var string
         */
        protected $keyPropertyName = 'password_reset_key';
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User login merge tag class
     */
    class UserLogin extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User Email merge tag class
     */
    class UserEmail extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User first name merge tag class
     */
    class UserFirstName extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User role merge tag class
     */
    class UserRole extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User Bio merge tag class
     */
    class UserBio extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User Display name merge tag class
     */
    class UserDisplayName extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User last name merge tag class
     */
    class UserLastName extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * User nickname merge tag class
     */
    class UserNickname extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Taxonomy {
    /**
     * Taxonomy term description merge tag class
     */
    class TermDescription extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy term ID merge tag class
     */
    class TermID extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy term slug merge tag class
     */
    class TermSlug extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy term permalink merge tag class
     */
    class TermPermalink extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy name merge tag class
     */
    class TaxonomyName extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy slug merge tag class
     */
    class TaxonomySlug extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Taxonomy term name merge tag class
     */
    class TermName extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.2.2
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\MergeTag\Media {
    /**
     * Attachment direct URL merge tag class
     */
    class AttachmentDirectUrl extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Attachment page merge tag class
     */
    class AttachmentPage extends \BracketSpace\Notification\Repository\MergeTag\UrlTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Attachment ID merge tag class
     */
    class AttachmentID extends \BracketSpace\Notification\Repository\MergeTag\IntegerTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Attachment title merge tag class
     */
    class AttachmentTitle extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
    /**
     * Attachment MIME type merge tag class
     */
    class AttachmentMimeType extends \BracketSpace\Notification\Repository\MergeTag\StringTag
    {
        /**
         * Merge tag constructor
         *
         * @param array<mixed> $params merge tag configuration params.
         * @since 5.0.0
         */
        public function __construct($params = [])
        {
        }
    }
}
namespace BracketSpace\Notification\Repository {
    /**
     * Converter Repository.
     */
    class ConverterRepository
    {
        /**
         * @return void
         */
        public static function register()
        {
        }
    }
    /**
     * Carrier Repository.
     */
    class CarrierRepository
    {
        /**
         * @return void
         */
        public static function register()
        {
        }
    }
    /**
     * Resolver Repository.
     */
    class ResolverRepository
    {
        /**
         * @return void
         */
        public static function register()
        {
        }
    }
}
namespace BracketSpace\Notification\Repository\Carrier {
    /**
     * Email Carrier
     */
    class Email extends \BracketSpace\Notification\Repository\Carrier\BaseCarrier
    {
        /**
         * Carrier icon
         *
         * @var string SVG
         */
        //phpcs:ignore Generic.Files.LineLength.TooLong
        public $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 384"><path d="M448,64H64A64,64,0,0,0,0,128V384a64,64,0,0,0,64,64H448a64,64,0,0,0,64-64V128A64,64,0,0,0,448,64ZM342.66,234.78,478.13,118.69A31.08,31.08,0,0,1,480,128V384c0,2.22-.84,4.19-1.28,6.28ZM448,96c2.13,0,4,.81,6,1.22L256,266.94,58,97.22c2-.41,3.88-1.22,6-1.22ZM33.27,390.25c-.44-2.09-1.27-4-1.27-6.25V128a30.79,30.79,0,0,1,1.89-9.31L169.31,234.75ZM64,416a31,31,0,0,1-9.12-1.84L193.63,255.59l52,44.53a15.92,15.92,0,0,0,20.82,0l52-44.54L457.13,414.16A30.82,30.82,0,0,1,448,416Z" transform="translate(0 -64)"/></svg>';
        /**
         * Carrier constructor
         *
         * @since 5.0.0
         */
        public function __construct()
        {
        }
        /**
         * Gets the default name for "From" header.
         *
         * @return  string
         */
        public static function getDefaultFromName() : string
        {
        }
        /**
         * Gets the default email for "From" header.
         *
         * @return  string
         */
        public static function getDefaultFromEmail() : string
        {
        }
        /**
         * Used to register Carrier form fields
         * Uses $this->addFormField();
         *
         * @return void
         */
        public function formFields()
        {
        }
        /**
         * Sets mail type to text/html for wp_mail
         *
         * @return string mail type
         */
        public function setMailType()
        {
        }
        /**
         * Sends the notification
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger trigger object.
         * @return void
         */
        public function send(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Replaces the filtered body with the unfiltered one if
         * the notifications/email/unfiltered_html setting is set to true.
         *
         * @filter notification/carrier/form/data/values
         *
         * @param array<mixed> $carrierData Carrier data from PostData.
         * @param array<mixed> $rawData Raw data from PostData, it contains the unfiltered message body.
         * @return array<mixed> Carrier data with the unfiltered body,
         * if notifications/email/unfiltered_html setting is true.
         **/
        public function allowUnfilteredHtmlBody($carrierData, $rawData)
        {
        }
        /**
         * Gets the list of headers.
         *
         * @return  array<string>
         */
        protected function getHeaders() : array
        {
        }
        /**
         * Gets organized list of carrier headers.
         *
         * @return  array<string, string>
         */
        protected function getCarrierHeaders() : array
        {
        }
        /**
         * Gets the default "From" header value.
         *
         * @return  string
         */
        protected function getDefaultFromHeader() : string
        {
        }
    }
}
namespace BracketSpace\Notification\Repository {
    /**
     * Global Merge Tag Repository.
     */
    class GlobalMergeTagRepository
    {
        /**
         * @return void
         */
        public static function register()
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Resolvable interface
     */
    interface Resolvable
    {
        /**
         * Gets slug
         *
         * @return string Slug
         */
        public function getSlug();
        /**
         * Gets merge tag pattern
         *
         * @return string Pattern
         */
        public function getPattern();
        /**
         * Gets resolver priority
         *
         * @return int Priority
         */
        public function getPriority();
        /**
         * Resolves single matched merge tag
         *
         * @param array<mixed> $match Match array.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return string              Resolved value
         */
        public function resolveMergeTag($match, \BracketSpace\Notification\Interfaces\Triggerable $trigger);
    }
}
namespace BracketSpace\Notification\Repository\Resolver {
    /**
     * Resolver class
     */
    abstract class BaseResolver implements \BracketSpace\Notification\Interfaces\Resolvable
    {
        /**
         * Resolver priority
         * Higher number means later execution
         */
        const PRIORITY = 100;
        /**
         * Resolver pattern
         */
        const PATTERN = '';
        /**
         * Gets resolver slug
         * Note: it's automatically generated from the class name.
         *
         * @return string
         * @since  6.0.0
         */
        public function getSlug()
        {
        }
        /**
         * Gets merge tag pattern
         *
         * @return string
         * @since  6.0.0
         */
        public function getPattern()
        {
        }
        /**
         * Gets resolver priority
         *
         * @return int
         * @since  6.0.0
         */
        public function getPriority()
        {
        }
        /**
         * {@inheritdoc}
         *
         * @param array<mixed> $match Match array.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @returns string
         */
        public function resolveMergeTag($match, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
    /**
     * Basic resolver
     */
    class Basic extends \BracketSpace\Notification\Repository\Resolver\BaseResolver
    {
        /**
         * Resolver priority
         * Higher number means later execution
         */
        const PRIORITY = 100;
        /**
         * Resolver pattern
         */
        const PATTERN = '/(?<!\\!)\\{(?:[^{}])*\\}/';
        /**
         * {@inheritdoc}
         *
         * @param array<mixed> $match Match array.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return mixed               Resolved value
         */
        public function resolveMergeTag($match, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
    }
}
namespace BracketSpace\Notification\Compat {
    /**
     * RestApi compat class
     */
    class RestApiCompat
    {
        /**
         * Method sends request to API, based on response checks whether REST API works correctly
         *
         * @action admin_notices
         *
         * @return void
         * @since 8.0.12
         */
        public function testRestApi()
        {
        }
    }
    /**
     * WebhookCompat class
     *
     * @since [Next]
     */
    class WebhookCompat
    {
        /**
         * Checks wether webhook carriers are in th database
         *
         * @return bool
         */
        public static function hasDeprecatedWebhookCarriers() : bool
        {
        }
        /**
         * Displays a notice message when someone is
         * using the deprecated webhooks.
         *
         * @action admin_notices
         *
         * @return void
         */
        public function displayNotice()
        {
        }
    }
}
namespace BracketSpace\Notification\Core {
    /**
     * Resolver class
     */
    class Resolver
    {
        /**
         * Resolves value with all the resolvers
         *
         * @param string $value Unresolved string with tags.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return string               Resolved value
         * @since  8.0.0 Method is static
         * @since  6.0.0
         */
        public static function resolve($value, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Clears any Merge Tags
         *
         * @param string $value Unresolved string with tags.
         * @return string
         * @since  6.0.0
         * @since  8.0.0 Method is static
         */
        public static function clear($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils {
    /**
     * Settings class
     */
    class Settings
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Settings handle, used as a prefix for options
         *
         * @var string
         */
        public $handle;
        /**
         * Textdomain for all strings, if not provided the handle is used
         *
         * @var string
         */
        public $textdomain;
        /**
         * Library root path
         *
         * @var string
         */
        protected $path;
        /**
         * Library root URI
         *
         * @var string
         */
        public $uri = '';
        /**
         * Settings page hook
         * Should be set outside the class
         * Typically result of add_menu_page function
         *
         * @var string
         */
        public $pageHook = '';
        /**
         * Settings constructor
         *
         * @param string $handle settings handle.
         * @param string|bool $textdomain textdomain.
         * @throws \Exception Exception.
         * @since 5.0.0
         */
        public function __construct($handle, $textdomain = false)
        {
        }
        /**
         * Settings page output
         *
         * @return void
         */
        public function settingsPage()
        {
        }
        /**
         * Add new section
         *
         * @param string $name Section name.
         * @param string $slug Section slug.
         * @return \BracketSpace\Notification\Utils\Settings\Section
         */
        public function addSection($name, $slug)
        {
        }
        /**
         * Get all registered sections
         *
         * @return array<mixed>
         */
        public function getSections()
        {
        }
        /**
         * Get section by section slug
         *
         * @param string $slug section slug.
         * @return mixed        section object or false if no section defined
         */
        public function getSection($slug = '')
        {
        }
        /**
         * Save Settings
         *
         * @return void
         */
        public function saveSettings()
        {
        }
        /**
         * Get all settings
         *
         * @return array<mixed> settings
         */
        public function getSettings()
        {
        }
        /**
         * Sets up the field values for Settings form
         *
         * @return void
         * @since  5.0.0
         */
        public function setupFieldValues()
        {
        }
        /**
         * Get single setting value
         *
         * @param string $setting setting section/group/field separated with /.
         * @return mixed           field value or null if name not found
         * @throws \Exception Exception.
         */
        public function getSetting($setting)
        {
        }
        /**
         * Update single settings value.
         *
         * @param string $setting setting name in `a/b/c` format.
         * @param mixed $value setting value.
         * @return  mixed
         * @throws \Exception Exception.
         */
        public function updateSetting($setting, $value)
        {
        }
        /**
         * Set Library variables like path and URI
         *
         * @return void
         */
        public function setVariables()
        {
        }
    }
}
namespace BracketSpace\Notification\Core {
    /**
     * Settings class
     */
    class Settings extends \BracketSpace\Notification\Utils\Settings
    {
        /**
         * Settings constructor
         */
        public function __construct()
        {
        }
        /**
         * Registers Settings page under plugin's menu
         *
         * @action admin_menu 20
         *
         * @return void
         */
        public function registerPage()
        {
        }
        /**
         * Registers Settings
         *
         * @action notification/init 5
         *
         * @return void
         */
        public function registerSettings()
        {
        }
    }
    /**
     * Templates class
     */
    class Templates
    {
        /**
         * Templates storage name.
         */
        const TEMPLATE_STORAGE = 'templates';
        /**
         * Renders the template
         *
         * @param string $name Template name.
         * @param array<mixed> $vars Template variables.
         * @return void
         * @since  8.0.0
         */
        public static function render(string $name, array $vars = [])
        {
        }
        /**
         * Gets the template string
         *
         * @param string $name Template name.
         * @param array<mixed> $vars Template variables.
         * @return string
         * @since  8.0.0
         */
        public static function get(string $name, array $vars = [])
        {
        }
        /**
         * Creates the Template object
         *
         * @param string $name Template name.
         * @param array<mixed> $vars Template variables.
         * @return \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template
         * @since  8.0.0
         */
        public static function create(string $name, array $vars = []) : \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template
        {
        }
        /**
         * Renders the template
         *
         * @return void
         * @since  8.0.0
         */
        public static function registerStorage()
        {
        }
    }
    /**
     * Debugging class
     */
    class Debugging
    {
        /**
         * Constructor
         *
         * @since 6.0.0
         */
        public function __construct()
        {
        }
        /**
         * Logs the message in database
         *
         * @since [Next]
         * @param string $component Component nice name, like `Core` or `Any Plugin Name`.
         * @param string $type Log type, values: notification|error|warning.
         * @param string $message Log formatted message.
         * @return bool|\WP_Error
         */
        public static function log($component, $type, $message)
        {
        }
        /**
         * Adds log to the database
         *
         * @param array<mixed> $logData Log data, must contain keys: type, component and message.
         * @return bool
         * @throws \Exception If any of the arguments is wrong.
         * @since 6.0.0
         */
        public function addLog($logData = [])
        {
        }
        /**
         * Gets logs from database
         *
         * @param int $page Page number, default: 1.
         * @param array<mixed> $types Array of log types to get, default: all.
         * @param string $component Component name, default: all.
         * @return array<mixed>  * @since  6.0.0
         */
        public function getLogs($page = 1, $types = null, $component = null)
        {
        }
        /**
         * Removes logs
         *
         * @param array<mixed> $types Array of log types to remove, default: all.
         * @return void
         * @since  6.0.0
         */
        public function removeLogs($types = null)
        {
        }
        /**
         * Get logs count from previous query
         * You have to call `get_logs` method first
         *
         * @param string $type Type of count, values: total|pages.
         * @return int
         * @since  6.0.0
         */
        public function getLogsCount($type = 'total')
        {
        }
        /**
         * Catches the Carrier into log.
         *
         * @action notification/carrier/pre-send 1000000
         *
         * @param \BracketSpace\Notification\Abstracts\Carrier $carrier Carrier object.
         * @param \BracketSpace\Notification\Abstracts\Trigger $trigger Trigger object.
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         * @return void
         * @since 5.3.0
         * @since 6.0.4 Using 3rd parameter for Notification object.
         */
        public function catchNotification($carrier, $trigger, $notification)
        {
        }
    }
    /**
     * Queue class
     */
    class Queue
    {
        /**
         * Items
         *
         * @var array<int, array{
         * notification: \BracketSpace\Notification\Core\Notification,
         * trigger: \BracketSpace\Notification\Interfaces\Triggerable}
         * >
         */
        protected static $items = [];
        /**
         * Adds the item to the queue
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger.
         * @param int|null $index Index at which to put the item.
         * @return void
         * @since 8.0.0
         */
        //phpcs:ignore SlevomatCodingStandard.TypeHints.NullableTypeForNullDefaultValue.NullabilitySymbolRequired
        public static function add(\BracketSpace\Notification\Core\Notification $notification, \BracketSpace\Notification\Interfaces\Triggerable $trigger, int $index = null)
        {
        }
        /**
         * Replaces the items if they are already in the queue
         * or adds new queue item
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger.
         * @return void
         * @since 8.0.0
         */
        public static function addReplace(\BracketSpace\Notification\Core\Notification $notification, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Checks if the items are already in the queue
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger.
         * @return bool
         * @since 8.0.0
         */
        public static function has(\BracketSpace\Notification\Core\Notification $notification, \BracketSpace\Notification\Interfaces\Triggerable $trigger) : bool
        {
        }
        /**
         * Gets items added to the queue
         *
         * @return array<int,array{
         * notification: \BracketSpace\Notification\Core\Notification,
         * trigger: \BracketSpace\Notification\Interfaces\Triggerable}
         * >
         * @since 8.0.0
         */
        public static function get() : array
        {
        }
        /**
         * Iterates over the queue items
         *
         * @param callable $callback Callback for each item.
         * @return void
         * @since 8.0.0
         */
        public static function iterate(callable $callback)
        {
        }
        /**
         * Clears the queue entirely
         *
         * @return void
         * @since 8.0.9
         */
        public static function clear()
        {
        }
        /**
         * Removes an item from the queue
         *
         * @param int $index Index of an item to remove.
         * @return void
         * @since 8.0.9
         */
        public static function remove(int $index)
        {
        }
    }
    /**
     * Upgrade class
     */
    class Upgrade
    {
        /**
         * Current data version
         *
         * @var int
         */
        public static $dataVersion = 3;
        /**
         * Version of database tables
         *
         * @var int
         */
        public static $dbVersion = 3;
        /**
         * Data version setting key name
         *
         * @var string
         */
        public static $dataSettingName = 'notification_data_version';
        /**
         * Database version setting key name
         *
         * @var string
         */
        public static $dbSettingName = 'notification_db_version';
        /**
         * Checks if an upgrade is required
         *
         * @action notification/init 100
         *
         * @return void
         * @since  6.0.0
         */
        public function checkUpgrade()
        {
        }
        /**
         * --------------------------------------------------
         * Database.
         * --------------------------------------------------
         */
        /**
         * Install database tables
         *
         * @action notification/init
         * @return void
         */
        public function upgradeDb()
        {
        }
        /**
         * --------------------------------------------------
         * Helper methods.
         * --------------------------------------------------
         */
        /**
         * Populates Carrier with field values pulled from meta
         *
         * @param string|\BracketSpace\Notification\Interfaces\Sendable $carrier Sendable object or Carrier slug.
         * @param int $postId Notification post ID.
         * @return \BracketSpace\Notification\Interfaces\Sendable
         * @throws \Exception If Carrier hasn't been found.
         * @since  6.0.0
         */
        protected function populateCarrier($carrier, $postId)
        {
        }
        /**
         * Gets new trigger slug replacements
         *
         * @return array<mixed>
         * @since  7.0.0
         */
        public function triggerSlugReplacements()
        {
        }
        /**
         * --------------------------------------------------
         * Upgrader methods.
         * --------------------------------------------------
         */
        /**
         * Upgrades data to v1.
         * - 1. Saves the Notification cache in post_content field.
         * - 2. Deletes trashed Notifications.
         * - 3. Removes old debug log.
         *
         * @return void
         * @since  6.0.0
         */
        public function upgradeToV1()
        {
        }
        /**
         * Upgrades data to v2.
         * - 1. Changes the Trigger slugs.
         * - 2. Changes the settings section `notifications` to `carriers`.
         *
         * @return void
         * @since  6.0.0
         */
        public function upgradeToV2()
        {
        }
        /**
         * Upgrades data to v3.
         * - 1. Moves the notifications to custom table.
         * - 2. Clears notifications cache.
         *
         * @since [Next]
         * @return void
         */
        public function upgradeToV3()
        {
        }
    }
    /**
     * Cron class
     */
    class Cron
    {
        /**
         * Registers custom intervals for Cron
         *
         * @filter cron_schedules
         *
         * @param array<mixed> $intervals intervals.
         * @return array<mixed>
         * @since  5.1.5
         */
        public function registerIntervals($intervals)
        {
        }
        /**
         * Registers and reschedules the check updates event
         *
         * @action admin_init
         *
         * @return void
         * @since  5.1.5
         */
        public function registerCheckUpdatesEvent()
        {
        }
        /**
         * Schedules the event
         *
         * @param string $schedule schedule name.
         * @param string $eventName event name.
         * @param bool $once if schedule only one.
         * @return void
         * @since  5.1.5
         */
        public function schedule($schedule, $eventName, $once = false)
        {
        }
        /**
         * Unschedules the event
         *
         * @param string $eventName event name.
         * @return void
         * @since  5.1.5
         */
        public function unschedule($eventName)
        {
        }
    }
    /**
     * Processor class
     */
    class Processor
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Processes the Queue
         *
         * @action shutdown
         *
         * @return void
         * @since  8.0.0
         */
        public function processQueue()
        {
        }
        /**
         * Scheduled the Notification submission in Cron.
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return void
         * @since  8.0.0
         */
        public static function schedule(\BracketSpace\Notification\Core\Notification $notification, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Dispatches all the Carriers attached for Notification.
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return void
         * @since  8.0.0
         */
        public static function processNotification(\BracketSpace\Notification\Core\Notification $notification, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Handles cron request
         *
         * @action notification_background_processing
         *
         * @param string $notificationJson Notification JSON.
         * @param string $triggerKey Trigger key.
         * @return void
         * @since  8.0.0
         */
        public static function handleCron($notificationJson, $triggerKey)
        {
        }
        /**
         * Sends the Carrier in context of Trigger
         *
         * @param \BracketSpace\Notification\Interfaces\Sendable $carrier Carrier object.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return void
         * @since  8.0.0
         */
        public static function send(\BracketSpace\Notification\Interfaces\Sendable $carrier, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Gets cache instance
         *
         * @param string $triggerKey Trigger key.
         * @return \BracketSpace\Notification\Dependencies\Micropackage\Cache\Cache
         * @since  8.0.11
         */
        public static function getCache($triggerKey)
        {
        }
    }
    /**
     * License class
     */
    class License
    {
        /**
         * Extension data
         *
         * @var array<mixed>
         */
        protected $extension;
        /**
         * License storage key
         *
         * @var string
         */
        protected $licenseStorage = 'notification_licenses';
        /**
         * Class constructor
         *
         * @param array<mixed> $extension extension data.
         * @since 5.1.0
         */
        public function __construct(array $extension)
        {
        }
        /**
         * Gets all licenses from database
         *
         * @return array<mixed> licenses
         * @since  5.1.0
         */
        public function getLicenses()
        {
        }
        /**
         * Gets single license info
         *
         * @return mixed license data or false
         * @since  5.1.0
         */
        public function get()
        {
        }
        /**
         * Checks if license is valid
         *
         * @return bool
         * @since  5.1.0
         */
        public function isValid()
        {
        }
        /**
         * Gets the license key
         *
         * @return string
         * @since  7.1.1
         */
        public function getKey()
        {
        }
        /**
         * Saves single license info
         *
         * @param object $licenseData license data from API.
         * @return void
         * @since  5.1.0
         */
        public function save($licenseData)
        {
        }
        /**
         * Removes single license from database
         *
         * @return void
         * @since  5.1.0
         */
        public function remove()
        {
        }
        /**
         * Activates the license
         *
         * @param string $licenseKey license key.
         * @return mixed               WP_Error or License data
         * @since  5.1.0
         */
        public function activate($licenseKey = '')
        {
        }
        /**
         * Deactivates the license
         *
         * @return mixed WP_Error or License data
         * @since  5.1.0
         */
        public function deactivate()
        {
        }
        /**
         * Checks the license
         *
         * @param string $licenseKey license key.
         * @return object              WP_Error or license object
         * @since  5.1.0
         */
        public function check($licenseKey = '')
        {
        }
    }
    /**
     * Whitelabel class
     */
    class Whitelabel
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * If plugin is in whitelabel mode.
         *
         * @var bool
         */
        protected static $isWhitelabeled = false;
        /**
         * Removes defaults:
         * - triggers
         *
         * @action notification/init 1000
         *
         * @return void
         */
        public function removeDefaults()
        {
        }
        /**
         * Sets the plugin in white label mode.
         *
         * @param array<string,mixed> $args white label args.
         * @return void
         * @since  8.0.0
         */
        public static function enable(array $args = [])
        {
        }
        /**
         * Checks if the plugin is in white label mode.
         *
         * @return bool
         * @since  8.0.0
         */
        public static function isWhitelabeled() : bool
        {
        }
    }
    /**
     * Sync class
     */
    class Sync
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Sync path
         *
         * @var string|null
         */
        protected static $syncPath;
        /**
         * Gets all Notifications from JSON files
         *
         * @return array<int,string>
         * @since  6.0.0
         */
        public static function getAllJson()
        {
        }
        /**
         * Loads local JSON files
         *
         * @action notification/init 100
         *
         * @return void
         * @since  6.0.0
         */
        public function loadLocalJson()
        {
        }
        /**
         * Saves local JSON file
         *
         * @action notification/data/saved
         *
         * @since  6.0.0
         * @param Notification $notification Notification.
         * @return void
         */
        public static function saveLocalJson($notification)
        {
        }
        /**
         * Deletes local JSON file
         *
         * @action delete_post
         *
         * @param int $postId Deleted Post ID.
         * @return void
         * @since  6.0.0
         */
        public function deleteLocalJson($postId)
        {
        }
        /**
         * Enables the notification syncing
         * By default path used is current theme's `notifications` dir.
         *
         * @param string $path full json directory path or null to use default.
         * @return void
         * @throws \Exception If provided path is not a directory.
         * @since  8.0.0
         */
        //phpcs:ignore SlevomatCodingStandard.TypeHints.NullableTypeForNullDefaultValue.NullabilitySymbolRequired
        public static function enable(string $path = null)
        {
        }
        /**
         * Disables the synchronization.
         *
         * @return void
         * @since  8.0.0
         */
        public static function disable()
        {
        }
        /**
         * Gets the synchronization path.
         *
         * @return string|null
         * @since  8.0.0
         */
        public static function getSyncPath()
        {
        }
        /**
         * Gets the sync dir filesystem.
         *
         * @return \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem|null
         * @since  8.0.2
         */
        public static function getSyncFs()
        {
        }
        /**
         * Gets the synchronization path.
         *
         * @return bool
         * @since  8.0.0
         */
        public static function isSyncing() : bool
        {
        }
    }
    /**
     * Binder class
     */
    class Binder
    {
        /**
         * Binds the trigger registered actions
         *
         * @action notification/trigger/registered 100
         *
         * @param array<\BracketSpace\Notification\Interfaces\Triggerable> $triggers Array of Triggers or single Trigger.
         * @return void
         * @since 8.0.0
         */
        public static function bind($triggers)
        {
        }
    }
    class Notification
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Constructor
         *
         * @param NotificationData $data Notification data.
         * @since 6.0.0
         */
        public function __construct($data = [])
        {
        }
        /**
         * Clone method
         * Copies the Trigger and Carriers to new Carrier instance
         *
         * @return void
         * @since  6.0.0
         */
        public function __clone()
        {
        }
        /**
         * Sets up Notification data from array.
         *
         * @param NotificationData $data Data array.
         * @return $this
         * @throws \Exception If wrong arguments has been passed.
         * @since  6.0.0
         */
        public function setup($data = [])
        {
        }
        /**
         * Checks if enabled
         * Alias for `get_enabled()` method
         *
         * @return boolean
         * @since  6.0.0
         */
        public function isEnabled()
        {
        }
        /**
         * Creates hash
         *
         * @return string hash
         * @since  6.0.0
         */
        public static function createHash()
        {
        }
        /**
         * Gets single Carrier object
         *
         * @param string $carrierSlug Carrier slug.
         * @return Interfaces\Sendable|null
         * @since  6.0.0
         */
        public function getCarrier($carrierSlug)
        {
        }
        /**
         * Gets enabled Carriers
         *
         * @return array<string,Interfaces\Sendable>
         * @since  6.0.0
         */
        public function getEnabledCarriers()
        {
        }
        /**
         * Add Carrier to the set
         *
         * @param Interfaces\Sendable|string $carrier Carrier object or slug.
         * @return Interfaces\Sendable
         * @throws \Exception If you try to add already added Carrier.
         * @throws \Exception If you try to add non-existing Carrier.
         * @since  6.0.0
         */
        public function addCarrier($carrier)
        {
        }
        /**
         * Enables Carrier
         *
         * @param string $carrierSlug Carrier slug.
         * @return void
         * @since  6.0.0
         */
        public function enableCarrier($carrierSlug)
        {
        }
        /**
         * Disables Carrier
         *
         * @param string $carrierSlug Carrier slug.
         * @return void
         * @since  6.0.0
         */
        public function disableCarrier($carrierSlug)
        {
        }
        /**
         * Sets Carriers
         * Makes sure that the Notification slug is used as key.
         *
         * @param array<string,Interfaces\Sendable> $carriers Array of Carriers.
         * @return void
         * @since  6.0.0
         */
        public function setCarriers($carriers = [])
        {
        }
        /**
         * Sets Carrier data
         *
         * @param string $carrierSlug Carrier slug.
         * @param array<mixed> $data Carrier data.
         * @return void
         * @since  6.0.0
         */
        public function setCarrierData($carrierSlug, $data)
        {
        }
        /**
         * Gets Carrier data
         *
         * @param string $carrierSlug Carrier slug.
         * @return void
         * @since  6.0.0
         */
        public function getCarrierData($carrierSlug)
        {
        }
        /**
         * Gets single extra data value.
         *
         * @param string $key Extra data key.
         * @return array<mixed>|bool|float|int|string|null Extra data value or null
         * @since  6.0.0
         */
        public function getExtra($key)
        {
        }
        /**
         * Removes single extra data.
         *
         * @param string $key Extra data key.
         * @return void
         * @since  6.0.0
         */
        public function removeExtra($key)
        {
        }
        /**
         * Add extra data
         *
         * @param string $key Extra data key.
         * @param array<mixed>|bool|float|int|string $value Extra data value.
         * @return $this
         * @throws \Exception If extra is not type of array, string or number or boolean.
         * @since  6.0.0
         */
        public function addExtra($key, $value)
        {
        }
        /**
         * Refreshes the hash
         *
         * @return $this
         * @since  6.1.4
         */
        public function refreshHash()
        {
        }
        /**
         * @return string
         */
        public function getHash() : string
        {
        }
        /**
         * @param string $hash
         * @return Notification
         */
        public function setHash(string $hash) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return string
         */
        public function getTitle() : string
        {
        }
        /**
         * @param string $title
         * @return Notification
         */
        public function setTitle(string $title) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return Interfaces\Triggerable|null
         */
        public function getTrigger()
        {
        }
        /**
         * @param Interfaces\Triggerable|null $trigger
         * @return Notification
         */
        public function setTrigger($trigger) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return array<string, array<mixed>|bool|float|int|string>
         */
        public function getExtras() : array
        {
        }
        /**
         * @param array<string, array<mixed>|bool|float|int|string> $extras
         * @return Notification
         */
        public function setExtras(array $extras) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return int
         */
        public function getVersion() : int
        {
        }
        /**
         * @param int $version
         * @return Notification
         */
        public function setVersion(int $version) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return string
         */
        public function getSource() : string
        {
        }
        /**
         * @param string $source
         * @return Notification
         */
        public function setSource(string $source) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return array<string,Interfaces\Sendable>
         */
        public function getCarriers()
        {
        }
        /**
         * @param bool $enabled
         * @return Notification
         */
        public function setEnabled(bool $enabled) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * @return bool
         */
        public function getEnabled()
        {
        }
        /**
         * Sets the source post identifier.
         *
         * @param int $postId The post identifier
         * @return void
         */
        public function setSourcePostId($postId)
        {
        }
        /**
         * Dumps the object to array
         *
         * @since  6.0.0
         * @deprecated [Next] Use Converter instead, via $notification->to('array') method
         * @param bool $onlyEnabledCarriers If only enabled Carriers should be saved.
         * @return NotificationData|null
         */
        public function toArray($onlyEnabledCarriers = false)
        {
        }
        /**
         * Creates Notification from a specific representation
         *
         * @since [Next]
         * @throws \Exception When no Notification object comes back from the filter
         * @param string $type The type of representation, ie. array or json
         * @param string|array<mixed,mixed> $data The notification representation
         * @return self
         */
        public static function from(string $type, $data) : \BracketSpace\Notification\Core\Notification
        {
        }
        /**
         * Converts the notification to another type of representation.
         *
         * @since [Next]
         * @param string $type The type of representation, ie. array or json
         * @param array<string|int,mixed> $config The additional configuration of the converter
         * @return mixed
         */
        public function to(string $type, array $config = [])
        {
        }
        /**
         * Serialized Notification instance.
         *
         * @return NotificationAsArray
         */
        public function __serialize() : array
        {
        }
        /**
         * Unserializes Notification instance.
         *
         * @param NotificationAsArray $data Notification data as array.
         * @return void
         */
        public function __unserialize(array $data) : void
        {
        }
    }
    /**
     * Runner class
     */
    class Runner
    {
        /**
         * Trigger instance
         *
         * @var \BracketSpace\Notification\Interfaces\Triggerable
         */
        protected $trigger;
        /**
         * Run ID
         *
         * @var string
         */
        protected $id;
        /**
         * Storage for Trigger's Notifications
         *
         * @var array<\BracketSpace\Notification\Core\Notification>
         */
        protected $notifications = [];
        /**
         * Constructor
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger in subject.
         * @since 8.0.0
         */
        public final function __construct(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Runs the action by setting the context.
         *
         * Adds the specific Carrier and corresponding Trigger
         * to the Queue for later execution.
         *
         * @param array<mixed> ...$context Callback args setting context.
         * @return void
         * @since  8.0.0
         */
        public function run(...$context)
        {
        }
        /**
         * Attaches the Notifications to Trigger
         *
         * @return void
         */
        public function setNotifications()
        {
        }
        /**
         * Gets attached Notifications
         *
         * @return array<\BracketSpace\Notification\Core\Notification>
         */
        public function getNotifications()
        {
        }
        /**
         * Gets the copy of attached Trigger.
         *
         * @return \BracketSpace\Notification\Interfaces\Triggerable
         */
        public function getTrigger()
        {
        }
        /**
         * Check if Trigger has attached Notifications
         *
         * @return bool
         */
        public function hasNotifications()
        {
        }
        /**
         * Attaches the Notification
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification class.
         * @return void
         */
        public function attachNotification(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Detaches the Notification
         *
         * @param \BracketSpace\Notification\Core\Notification $notification Notification class.
         * @return void
         */
        public function detachNotification(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Detaches all the Notifications
         *
         * @return $this
         */
        public function detachAllNotifications()
        {
        }
    }
}
namespace BracketSpace\Notification\Traits {
    /**
     * Storage trait
     *
     * @template TItem
     */
    trait Storage
    {
        /**
         * Stored items
         *
         * @var array<TItem>
         */
        protected static $items = [];
        /**
         * Adds an item to the Store
         *
         * @param TItem $item Item to add.
         * @return void
         * @since  8.0.0
         */
        public static function add($item)
        {
        }
        /**
         * Inserts an item at a specific index.
         *
         * @since 8.0.0
         * @since [Next] Has third `$replace` param
         * @param int|string $index Item index.
         * @param TItem $item Item to add.
         * @param bool $replace If should be replaced if exists, default: false.
         * @return void
         */
        public static function insert($index, $item, $replace = false)
        {
        }
        /**
         * Gets all items
         *
         * @return array<TItem>
         * @since  8.0.0
         */
        public static function all() : array
        {
        }
        /**
         * Removes all items from the store
         *
         * @return void
         * @since  8.0.0
         */
        public static function clear()
        {
        }
        /**
         * Get item by index
         *
         * @param mixed $index Intex of an item.
         * @return TItem|null
         * @since  8.0.0
         */
        public static function get($index)
        {
        }
        /**
         * Checks if the Storage has item
         *
         * @param mixed $index Intex of an item.
         * @return bool
         * @since  8.0.0
         */
        public static function has($index) : bool
        {
        }
    }
}
namespace BracketSpace\Notification\Integration {
    /**
     * Two Factor plugin integration class
     */
    class TwoFactor
    {
        /**
         * Adds another authentication action
         *
         * @action notification/trigger/registered
         *
         * @param \BracketSpace\Notification\Abstracts\Trigger $trigger Trigger instance.
         * @return void
         * @since  7.0.0
         */
        public function addTriggerAction($trigger)
        {
        }
        /**
         * Proxies the 2FA action to change parameters
         *
         * @action two_factor_user_authenticated
         *
         * @param \WP_User $user User instance.
         * @return void
         * @since  7.0.0
         */
        public function userLoginWith2fa($user)
        {
        }
    }
    /**
     * WordPress integration class
     */
    class WordPressEmails
    {
        /**
         * Replaces the default hooks for the new user notification
         *
         * @action notification/init
         *
         * @return void
         * @since  6.1.0
         */
        public function replaceNewUserNotifyHooks()
        {
        }
        /**
         * Disables send the new user notification
         *
         * @param int $userId ID of the newly registered user.
         * @param string $notify Optional. Type of notification that should happen. Accepts 'admin'
         *                         or an empty string (admin only), 'user', or 'both' (admin and user).
         * @return void
         * @since  6.1.0
         */
        public function disableNewUserNotify($userId, $notify = 'both')
        {
        }
        /**
         * Disables send the post author new comment notification emails
         *
         * @filter notify_post_author
         *
         * @param bool $maybeNotify Whether to notify the post author about the new comment.
         * @param int $commentId The ID of the comment for the notification.
         * @return bool $maybeNotify
         * @since  6.1.0
         */
        public function disablePostAuthorNotify($maybeNotify, $commentId)
        {
        }
        /**
         * Disables send the site moderator email notifications about new comment
         *
         * @filter notify_moderator
         *
         * @param bool $maybeNotify Whether to notify blog moderator.
         * @param int $commentId The id of the comment for the notification.
         * @return bool $maybeNotify
         * @since  6.1.0
         */
        public function disableCommentModeratorNotify($maybeNotify, $commentId)
        {
        }
        /**
         * Disables send the email change email notification to admin
         *
         * @action notification/init
         *
         * @return void
         * @since  6.1.0
         */
        public function disablePasswordChangeNotifyToAdmin()
        {
        }
        /**
         * Disables confirmation email on profile email address change
         *
         * @action notification/init
         *
         * @return void
         * @since  8.0.0
         */
        public function disableSendConfirmationOnProfileEmail()
        {
        }
        /**
         * Disables confirmation email on admin email address change
         *
         * @action notification/init
         *
         * @return void
         * @since  8.0.0
         */
        public function disableSendConfirmationOnAdminEmail()
        {
        }
        /**
         * Disables email on admin email address changed
         *
         * @filter send_site_admin_email_change_email
         *
         * @since [Next]
         * @return bool
         */
        public function disableSendConfirmationOnAdminEmailChanged()
        {
        }
        /**
         * Disables send the email change email to user
         *
         * @filter send_password_change_email
         *
         * @param bool $send Whether to send the email.
         * @param array<mixed> $user The original user array.
         * @param array<mixed> $userdata The updated user array.
         * @return bool  $send
         * @since  6.1.0
         */
        public function disablePasswordChangeNotifyToUser($send, $user, $userdata)
        {
        }
        /**
         * Disables email to user when password reset is requested
         *
         * @filter retrieve_password_message 100
         *
         * @param string $message Message send to user.
         * @return string
         * @since 6.3.1
         */
        public function disablePasswordResetNotifyToUser($message)
        {
        }
        /**
         * Disables send the email change email
         *
         * @filter send_email_change_email
         *
         * @param bool $send Whether to send the email.
         * @param array<mixed> $user The original user array.
         * @param array<mixed> $userdata The updated user array.
         * @return bool  $send
         * @since  6.1.0
         */
        public function disableEmailChangeNotifyToUser($send, $user, $userdata)
        {
        }
        /**
         * Disables send an email following an automatic background core update
         *
         * @filter auto_core_update_send_email
         *
         * @param bool $send Whether to send the email. Default true.
         * @param string $type The type of email to send. Can be one of 'success', 'fail', 'critical'.
         * @param object $coreUpdate The update offer that was attempted.
         * @param mixed $result The result for the core update. Can be WP_Error.
         * @return bool   $send
         * @since  6.1.0
         */
        public function disableAutomaticWpCoreUpdateNotify($send, $type, $coreUpdate, $result)
        {
        }
    }
    /**
     * WordPress integration class
     */
    class WordPressIntegration
    {
        /**
         * --------------------------
         * Loaders & Cache
         * --------------------------
         */
        /**
         * Loads all Notifications from Database
         *
         * @action notification/init 9999999
         *
         * @since [Next]
         * @return void
         */
        public function loadDatabaseNotifications()
        {
        }
        /**
         * --------------------------
         * Duplicate prevention
         * --------------------------
         */
        /**
         * Prevents the duplicate notifications
         *
         * Gutenberg or other editors, especiallyu when used within other
         * plugins which manipulate the data.
         *
         * @filter notification/background_processing/trigger_key
         *
         * @param string $triggerKey Trigger unique key.
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return string
         * @since  8.0.0
         */
        public function identifyTrigger($triggerKey, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * --------------------------
         * Comment replied proxies
         * --------------------------
         */
        /**
         * Proxies the wp_insert_comment action to check
         * if comment is a reply.
         *
         * @action wp_insert_comment
         *
         * @param int $commentId Comment ID.
         * @param \WP_Comment $comment Comment object.
         * @return void
         * @since 5.3.1
         */
        public function proxyCommentReply($commentId, $comment)
        {
        }
        /**
         * --------------------------
         * Comment published proxies
         * --------------------------
         */
        /**
         * Proxies the comment_post action
         *
         * @action comment_post
         *
         * @param int $commentId Comment ID.
         * @param int|string $approved 1 if the comment is approved, 0 if not, 'spam' if spam.
         * @return void
         * @since 6.2.0
         */
        public function proxyPostCommentToPublished($commentId, $approved)
        {
        }
        /**
         * Proxies the transition_comment_status action
         *
         * @action transition_comment_status
         *
         * @param string $commentNewStatus New comment status.
         * @param string $commentOldStatus Old comment status.
         * @param \WP_Comment $comment Comment object.
         * @return void
         * @since 6.2.0
         */
        public function proxyTransitionCommentStatusToPublished($commentNewStatus, $commentOldStatus, $comment)
        {
        }
    }
}
namespace BracketSpace\Notification {
    /**
     * Register class
     */
    class Register
    {
        /**
         * Registers Notification
         *
         * @since [Next]
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         * @return \BracketSpace\Notification\Core\Notification
         */
        public static function notification(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Creates new Notification from array
         *
         * Accepts both array with Trigger and Carriers objects or static values.
         *
         * @since [Next]
         * @param NotificationUnconvertedData $data Notification data.
         * @return \WP_Error|true
         */
        public static function notificationFromArray($data = [])
        {
        }
        /**
         * Registers Notification if newer version is provided or doesn't exist at all
         *
         * @since [Next]
         * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
         * @return \BracketSpace\Notification\Core\Notification
         */
        public static function notificationIfNewer(\BracketSpace\Notification\Core\Notification $notification)
        {
        }
        /**
         * Registers Carrier
         *
         * @param \BracketSpace\Notification\Interfaces\Sendable $carrier Carrier object.
         * @return \BracketSpace\Notification\Interfaces\Sendable
         * @since  8.0.0
         */
        public static function carrier(\BracketSpace\Notification\Interfaces\Sendable $carrier)
        {
        }
        /**
         * Registers Recipient
         *
         * @param string $carrierSlug Carrier slug.
         * @param \BracketSpace\Notification\Interfaces\Receivable $recipient Recipient object.
         * @return \BracketSpace\Notification\Interfaces\Receivable
         * @since  8.0.0
         */
        public static function recipient(string $carrierSlug, \BracketSpace\Notification\Interfaces\Receivable $recipient)
        {
        }
        /**
         * Registers Recipient
         *
         * @param \BracketSpace\Notification\Interfaces\Resolvable $resolver Resolver object.
         * @return \BracketSpace\Notification\Interfaces\Resolvable
         * @since  8.0.0
         */
        public static function resolver(\BracketSpace\Notification\Interfaces\Resolvable $resolver)
        {
        }
        /**
         * Registers Trigger
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return \BracketSpace\Notification\Interfaces\Triggerable
         * @since  8.0.0
         */
        public static function trigger(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
        {
        }
        /**
         * Registers Global Merge Tag
         *
         * @param \BracketSpace\Notification\Interfaces\Taggable $mergeTag MergeTag object.
         * @return \BracketSpace\Notification\Interfaces\Taggable
         * @since  8.0.0
         */
        public static function globalMergeTag(\BracketSpace\Notification\Interfaces\Taggable $mergeTag)
        {
        }
    }
}
namespace BracketSpace\Notification\Admin {
    /**
     * PostType class
     */
    class PostType
    {
        /**
         * TABLE OF CONTENTS: -------------------------------
         * - Post Type.
         * - Delete.
         * - Save.
         * - AJAX.
         * - Notifications.
         * --------------------------------------------------
         */
        /**
         * --------------------------------------------------
         * Post Type.
         * --------------------------------------------------
         */
        /**
         * Registers Notification post type
         *
         * @action init
         *
         * @return void
         */
        public function register()
        {
        }
        /**
         * Filters the post updated messages
         *
         * @filter post_updated_messages
         *
         * @param array<mixed> $messages Messages.
         * @return array<mixed>
         * @since  5.2.0
         */
        public function postUpdatedMessages($messages)
        {
        }
        /**
         * Filters the bulk action messages
         *
         * @filter bulk_post_updated_messages
         *
         * @param array<mixed> $bulkMessages Messages.
         * @param array<mixed> $bulkCounts Counters.
         * @return array<mixed>
         * @since  6.0.0
         */
        public function bulkActionMessages($bulkMessages, $bulkCounts)
        {
        }
        /**
         * Changes the notification post statuses above the post table
         *
         * @filter views_edit-notification
         *
         * @param array<mixed> $statuses Statuses array.
         * @return array<mixed>
         * @since  6.0.0
         */
        public function changePostStatuses($statuses)
        {
        }
        /**
         * --------------------------------------------------
         * Delete.
         * --------------------------------------------------
         */
        /**
         * Deletes the post entirely bypassing the trash
         * And removes the Notification from custom table
         *
         * @action wp_trash_post 100
         *
         * @since 6.0.0
         * @param int $postId Post ID.
         * @return void
         */
        public function bypassTrash($postId)
        {
        }
        /**
         * Removes the Notification from custom table upon WP Post deletion
         *
         * @action after_delete_post 100
         *
         * @since [Next]
         * @param int $postId Post ID.
         * @param \WP_Post $post WP Post object.
         * @return void
         */
        public function deleteNotification($postId, $post)
        {
        }
        /**
         * --------------------------------------------------
         * Save.
         * --------------------------------------------------
         */
        /**
         * Saves the Notification data
         *
         * @action save_post_notification
         *
         * @since [Next] We're saving the Notification to custom table instead of Post Type. Post is just the shell.
         * @param int $postId Current post ID.
         * @param \WP_Post $post WP_Post object.
         * @param bool $update If existing notification is updated.
         * @return void
         */
        public function save($postId, $post, $update)
        {
        }
        /**
         * --------------------------------------------------
         * AJAX.
         * --------------------------------------------------
         */
        /**
         * Changes notification status from AJAX call
         *
         * @action wp_ajax_change_notification_status
         *
         * @return void
         */
        public function ajaxChangeNotificationStatus()
        {
        }
        /**
         * Gets all Notifications from database.
         *
         * @deprecated [Next] Use BracketSpace\Notification\Database\NotificationDatabaseService::getAll();
         * @since  6.0.0
         * @return array<Notification>
         */
        public static function getAllNotifications()
        {
        }
    }
    /**
     * Settings class
     */
    class Settings
    {
        /**
         * Registers General settings
         *
         * @action notification/settings/register
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function generalSettings($settings)
        {
        }
        /**
         * Registers Triggers settings
         *
         * @action notification/settings/register 20
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function triggersSettings($settings)
        {
        }
        /**
         * Registers Carrier settings
         *
         * @action notification/settings/register 30
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function carriersSettings($settings)
        {
        }
        /**
         * Registers Emails settings
         *
         * @action notification/settings/register 40
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function emailsSettings($settings)
        {
        }
        /**
         * Filters post types from supported posts
         *
         * @filter notification/settings/triggers/valid_post_types
         *
         * @param array<mixed> $postTypes post types.
         * @return array<mixed>
         * @since  5.0.0
         */
        public function filterPostTypes($postTypes)
        {
        }
    }
    /**
     * Scripts class
     */
    class Scripts
    {
        /**
         * Scripts constructor
         *
         * @param \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem $fs Assets filesystem object.
         * @since 5.0.0
         */
        public function __construct(\BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem $fs)
        {
        }
        /**
         * Enqueue scripts and styles for admin
         *
         * @action admin_enqueue_scripts
         *
         * @param string $pageHook current page hook.
         * @return void
         */
        public function enqueueScripts($pageHook)
        {
        }
    }
    /**
     * Wizard class
     */
    class Wizard
    {
        /**
         * Wizard page hook.
         *
         * @var string|false
         */
        public $pageHook = 'none';
        /**
         * Option name for dismissed Wizard.
         *
         * @var string
         */
        protected $dismissedOption = 'notification_wizard_dismissed';
        /**
         * Wizard constructor
         *
         * @param \BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem $fs Includes filesystem object.
         * @since 7.0.0 Changed the Files util to Filesystem.
         */
        public function __construct(\BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem $fs)
        {
        }
        /**
         * Register Wizard invisible page.
         *
         * @action admin_menu 30
         *
         * @return void
         */
        public function registerPage()
        {
        }
        /**
         * Redirects the user to Wizard screen.
         *
         * @action current_screen
         *
         * @return void
         */
        public function maybeRedirect()
        {
        }
        /**
         * Displays the Wizard page.
         *
         * @return void
         */
        public function wizardPage()
        {
        }
        /**
         * Gets settings for Wizard page.
         *
         * @return array<mixed> List of settings groups.
         */
        public function getSettings()
        {
        }
        /**
         * Saves Wizard settings.
         *
         * @action admin_post_save_notification_wizard
         *
         * @return void
         */
        public function saveSettings()
        {
        }
        /**
         * Checks if wizard should be displayed
         *
         * @return bool
         * @since  8.0.0
         */
        public static function shouldDisplay()
        {
        }
    }
    /**
     * Debugging class
     */
    class Debugging
    {
        /**
         * Registers Debugging settings
         *
         * @action notification/settings/register 70
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function debuggingSettings($settings)
        {
        }
        /**
         * Displays debug log warning
         *
         * @action admin_notices
         *
         * @return void
         * @since  5.3.0
         */
        public function debugWarning()
        {
        }
        /**
         * Clears logs from database
         *
         * @action admin_post_notification_clear_logs
         *
         * @return void
         * @since  6.0.0
         */
        public function actionClearLogs()
        {
        }
    }
    /**
     * Upsell class
     */
    class Upsell
    {
        /**
         * Adds conditionals metabox
         *
         * @action add_meta_boxes
         *
         * @return void
         * @since  8.0.0
         */
        public function addConditionalsMetaBox()
        {
        }
        /**
         * Conditionals metabox content
         *
         * @param object $post current WP_Post.
         * @return void
         * @since  8.0.0
         */
        public function conditionalsMetabox($post)
        {
        }
        /**
         * Prints additional Merge Tag group in Merge Tags metabox
         * Note: Used when there are Merge Tag groups
         *
         * @action notification/metabox/trigger/tags/groups/after
         *
         * @return void
         * @since  8.0.0
         */
        public function customFieldsMergeTagGroup()
        {
        }
        /**
         * Renders review queue switch
         *
         * @action notification/admin/metabox/save/post
         *
         * @return void
         * @since  8.0.0
         */
        public function reviewQueueSwitch()
        {
        }
        /**
         * Registers Scheduled Triggers settings
         *
         * @action notification/settings/register 200
         *
         * @param \BracketSpace\Notification\Core\Settings $settings Settings API object.
         * @return void
         * @since  8.0.0
         */
        public function scheduledTriggersSettings($settings)
        {
        }
        /**
         * Adds Trigger upselling.
         *
         * @action notification/settings/section/triggers/before
         *
         * @return void
         * @since  8.0.0
         */
        public function triggersSettingsUpsell()
        {
        }
        /**
         * Adds Carrier upselling.
         *
         * @action notification/settings/section/carriers/before
         *
         * @return void
         * @since  8.0.0
         */
        public function carriersSettingsUpsell()
        {
        }
        /**
         * Adds missing Carriers to the List.
         *
         * @action notification/carrier/list/after
         *
         * @return void
         * @since  8.0.0
         */
        public function carriersList()
        {
        }
        /**
         * Adds custom development CTA
         *
         * @action notification/settings/sidebar/after
         *
         * @return void
         * @since  8.0.0
         */
        public function customDevelopment()
        {
        }
        /**
         * Gets the missing carriers
         *
         * @return array<string,array{name: string, pro: bool, link: string, icon: string}>
         * @since  8.0.0
         */
        public static function getMissingCarriers()
        {
        }
    }
    /**
     * Import/Export class
     */
    class ImportExport
    {
        /**
         * Registers Import/Export settings
         *
         * @action notification/settings/register 60
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function settings($settings)
        {
        }
        /**
         * Handles export request
         *
         * @action admin_post_notification_export
         *
         * @return void
         * @since  6.0.0
         */
        public function exportRequest()
        {
        }
        /**
         * Prepares notifications data for export
         *
         * @since 6.0.0
         * @since 8.0.2 Accepts the items argument, instead reading it from GET.
         * @since [Next] Uses NotificationDatabaseService instead of get_posts().
         * @param array<int,string> $items Items to export.
         * @return array<int,string>
         * @throws \Exception When no items selected for export.
         */
        public function prepareNotificationsExportData(array $items = [])
        {
        }
        /**
         * Handles import request
         *
         * @action wp_ajax_notification_import_json
         *
         * @return void
         * @since  6.0.0
         */
        public function importRequest()
        {
        }
        /**
         * Imports notifications
         *
         * @param array<mixed> $data Notifications data.
         * @return string
         * @since  6.0.0
         */
        public function processNotificationsImportRequest($data)
        {
        }
    }
    /**
     * Screen class
     */
    class Screen
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * TABLE OF CONTENTS: -------------------------------
         * - Helpers.
         * - Setup.
         * - Display.
         * - Screen Help.
         * - AJAX Renders.
         * --------------------------------------------------
         */
        /**
         * --------------------------------------------------
         * Helpers.
         * --------------------------------------------------
         */
        /**
         * Gets currently displayed Notification.
         *
         * @return ?Notification
         */
        public static function getCurrentNotification()
        {
        }
        /**
         * --------------------------------------------------
         * Setup.
         * --------------------------------------------------
         */
        /**
         * Renders main column on the Notification edit screen.
         *
         * @action load-post.php
         *
         * @return void
         */
        public function setupNotification()
        {
        }
        /**
         * --------------------------------------------------
         * Display.
         * --------------------------------------------------
         */
        /**
         * Renders main column on the Notification edit screen.
         *
         * @action edit_form_after_title 1
         *
         * @param \WP_Post $post Post object.
         * @return void
         */
        public function renderMainColumn($post)
        {
        }
        /**
         * Renders the trigger metabox
         *
         * @action notification/post/column/main
         *
         * @param Notification $notification Notification object.
         * @return void
         */
        public function renderTriggerSelect($notification)
        {
        }
        /**
         * Adds Carriers section title on post edit screen,
         * just under the Trigger and prints Carrier boxes
         *
         * @action notification/post/column/main 20
         *
         * @param Notification $notification Notification object.
         * @return void
         */
        public function renderCarrierBoxes($notification)
        {
        }
        /**
         * Renders a widget for adding Carriers
         *
         * @action notification/admin/carriers
         *
         * @param Notification $notification Notification object.
         * @return void
         */
        public function renderCarriersWidget($notification)
        {
        }
        /**
         * Gets Carrier config form
         *
         * @param \BracketSpace\Notification\Interfaces\Sendable $carrier Carrier object.
         * @return string                       Form HTML.
         * @since  6.0.0
         */
        public function getCarrierForm(\BracketSpace\Notification\Interfaces\Sendable $carrier)
        {
        }
        /**
         * Adds metabox with Save button
         *
         * @action add_meta_boxes
         *
         * @return void
         */
        public function addSaveMetaBox()
        {
        }
        /**
         * Renders Save metabox
         *
         * @param \WP_Post $post current WP_Post.
         * @return void
         */
        public function renderSaveMetabox($post)
        {
        }
        /**
         * Adds metabox with Merge Tags.
         *
         * @action add_meta_boxes
         *
         * @return void
         */
        public function addMergeTagsMetaBox()
        {
        }
        /**
         * Renders Merge Tags metabox
         *
         * @param \WP_Post $post current WP_Post.
         * @return void
         */
        public function renderMergeTagsMetabox($post)
        {
        }
        /**
         * Renders Merge Tags list
         *
         * @param string $triggerSlug Trigger slug.
         * @return void
         */
        public function renderMergeTagsList($triggerSlug)
        {
        }
        /**
         * Prepares merge tag groups for provided Trigger.
         *
         * @param \BracketSpace\Notification\Interfaces\Triggerable $trigger Trigger object.
         * @return array<mixed> $groups  Grouped tags.
         */
        public function prepareMergeTagGroups($trigger)
        {
        }
        /**
         * Cleans up all metaboxes to keep the screen nice and clean
         *
         * @action add_meta_boxes 999999999
         *
         * @return void
         */
        public function metaboxCleanup()
        {
        }
        /**
         * --------------------------------------------------
         * Screen Help.
         * --------------------------------------------------
         */
        /**
         * Adds help tabs and useful links
         *
         * @action current_screen
         *
         * @param object $screen current WP_Screen.
         * @return void
         */
        public function addHelp($screen)
        {
        }
        /**
         * --------------------------------------------------
         * AJAX Renders.
         * --------------------------------------------------
         */
        /**
         * Renders Merge Tags metabox for AJAX call.
         *
         * @action wp_ajax_get_merge_tags_for_trigger
         *
         * @return void
         */
        public function ajaxRenderMergeTags()
        {
        }
    }
    /**
     * Notification duplicator class
     */
    class NotificationDuplicator
    {
        /**
         * Adds duplicate link to row actions
         *
         * @filter post_row_actions 50
         *
         * @param array<mixed> $rowActions array with action links.
         * @param object $post WP_Post object.
         * @return array<mixed>               filtered actions
         */
        public function addDuplicateRowAction($rowActions, $post)
        {
        }
        /**
         * Duplicates the notification
         *
         * @action admin_post_notification_duplicate
         *
         * @return void
         * @since  5.2.3
         */
        public function notificationDuplicate()
        {
        }
    }
    /**
     * Sync class
     */
    class Sync
    {
        /**
         * Registers synchronization settings
         * Hooks into the Import / Export settings.
         *
         * @action notification/settings/register 50
         *
         * @param \BracketSpace\Notification\Utils\Settings $settings Settings API object.
         * @return void
         */
        public function settings($settings)
        {
        }
        /**
         * Gets the actions template
         *
         * @return string
         * @since  6.0.0
         */
        public function templateActions()
        {
        }
        /**
         * Synchronizes the Notification
         *
         * @action wp_ajax_notification_sync
         *
         * @return void
         */
        public function ajaxSync()
        {
        }
        /**
         * Loads the Notification to JSON
         *
         * @param string $hash Notification hash.
         * @return void
         * @since  6.0.0
         */
        public function loadNotificationToJson($hash)
        {
        }
        /**
         * Loads the Notification to JSON
         *
         * @param string $hash Notification hash.
         * @return mixed
         * @since  6.0.0
         */
        public function loadNotificationToWordpress($hash)
        {
        }
    }
    /**
     * PostTable class
     */
    class PostTable
    {
        /**
         * Adds custom table columns
         *
         * @filter manage_notification_posts_columns
         *
         * @param array<mixed> $columns current columns.
         * @return array<mixed> filtered columns
         */
        public function tableColumns($columns)
        {
        }
        /**
         * Cleans up Notification table columns.
         *
         * @filter manage_edit-notification_columns 999999999
         *
         * @param array<string,string> $columns Columns.
         * @return array<string,string>
         */
        public function columnCleanup($columns)
        {
        }
        /**
         * Content for custom columns
         *
         * @action manage_notification_posts_custom_column
         *
         * @param string $column Column slug.
         * @param int $postId Post ID.
         * @return void
         */
        public function tableColumnContent($column, $postId)
        {
        }
        /**
         * Remove all inline states to be displayed on notifications table
         *
         * @filter display_post_states
         *
         * @param array<mixed> $postStates an array of post display states.
         * @param \WP_Post $post the current post object.
         * @return array<mixed>               filtered states
         */
        public function removeStatusDisplay($postStates, $post)
        {
        }
        /**
         * Removes quick edit from post inline actions
         *
         * @filter post_row_actions
         *
         * @param array<mixed> $rowActions array with action links.
         * @param object $post WP_Post object.
         * @return array<mixed> filtered actions
         */
        public function removeQuickEdit($rowActions, $post)
        {
        }
        /**
         * Changes trash link to something more descriptive
         * Notifications cannot be trashed, it can be only removed
         *
         * @filter post_row_actions
         *
         * @param array<mixed> $rowActions array with action links.
         * @param object $post WP_Post object.
         * @return array<mixed>               filtered actions
         */
        public function adjustTrashLink($rowActions, $post)
        {
        }
        /**
         * Changes the table bulk actions.
         *
         * @filter bulk_actions-edit-notification
         *
         * @param array<mixed> $actions Bulk actions array.
         * @return array<mixed>          Filtered actions
         */
        public function adjustBulkActions($actions)
        {
        }
        /**
         * Handles status bulk actions
         *
         * @filter handle_bulk_actions-edit-notification 10
         *
         * @param string $redirectTo Redirect to link.
         * @param string $doaction Action to perform.
         * @param array<int> $postIds Array with post ids.
         * @return string              Redirect link.
         * @since  7.1.0
         */
        public function handleStatusBulkActions($redirectTo, $doaction, $postIds)
        {
        }
        /**
         * Prints notices for bulk status changes.
         *
         * @action admin_notices
         *
         * @return void
         * @since 7.1.0
         */
        public function displayBulkActionsAdminNotices()
        {
        }
    }
    /**
     * Extensions class
     */
    class Extensions
    {
        /**
         * Premium Extensions list
         *
         * @var array<mixed>
         */
        public $premiumExtensions = [];
        /**
         * Extensions admin page hook
         *
         * @var string|false
         */
        public $pageHook = 'none';
        /**
         * Register Extensions page under plugin's menu
         *
         * @action admin_menu
         *
         * @return void
         */
        public function registerPage()
        {
        }
        /**
         * Loads all extensions
         * If you want to get your extension listed please send a message via
         * https://bracketspace.com/contact/ contact form
         *
         * @return void
         */
        public function loadExtensions()
        {
        }
        /**
         * Gets raw extensions data from API
         *
         * @return array<mixed>
         */
        public function getRawExtensions()
        {
        }
        /**
         * Gets single raw extension data
         *
         * @param string $slug extension slug.
         * @return array<mixed>|false
         */
        public function getRawExtension($slug)
        {
        }
        /**
         * Outputs extensions page
         *
         * @return void
         */
        public function extensionsPage()
        {
        }
        /**
         * Initializes the Updater for all the premium plugins
         *
         * @action admin_init
         *
         * @return void
         */
        public function updater()
        {
        }
        /**
         * Activates the premium extension.
         *
         * @action admin_post_notification_activate_extension
         *
         * @return void
         */
        public function activate()
        {
        }
        /**
         * Deactivates the premium extension.
         *
         * @action admin_post_notification_deactivate_extension
         *
         * @return void
         */
        public function deactivate()
        {
        }
        /**
         * Displays activation notices
         *
         * @action admin_notices
         *
         * @return void
         */
        public function activationNotices()
        {
        }
        /**
         * Gets extensions with invalid license
         *
         * @return array<string>
         */
        public function getInvalidLicenseExtensions()
        {
        }
        /**
         * Displays activation notice nag
         *
         * @action admin_notices
         *
         * @return void
         */
        public function activationNag()
        {
        }
        /**
         * Displays inactive license warning
         *
         * @action notification/admin/extensions/premium/pre
         *
         * @return void
         */
        public function inactiveLicenseWarning()
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Settings {
    /**
     * Group class
     */
    class Group
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Group constructor
         *
         * @param string $handle Settings handle.
         * @param string $name Group name.
         * @param string $slug Group slug.
         * @param string $section Section slug.
         * @throws \Exception Exception.
         */
        public function __construct($handle, $name, $slug, $section)
        {
        }
        /**
         * Get or set name
         *
         * @param string $name Name. Do not pass anything to get current value.
         * @return string name
         */
        public function name($name = null)
        {
        }
        /**
         * Get or set slug
         *
         * @param string $slug Slug. Do not pass anything to get current value.
         * @return string slug
         */
        public function slug($slug = null)
        {
        }
        /**
         * Get or set section
         *
         * @param string $section Section. Do not pass anything to get current value.
         * @return string section
         */
        public function section($section = null)
        {
        }
        /**
         * Set or get description
         *
         * @param mixed $description string to set description, null to get it.
         * @return string|\BracketSpace\Notification\Utils\Settings\Group
         * String when using getter and Group when using setter
         */
        public function description($description = null)
        {
        }
        /**
         * Set or get collapsed
         *
         * @param bool|null $collapsed Bool to set collapsed, null to get it.
         * @return bool|\BracketSpace\Notification\Utils\Settings\Group String when using getter and Group when using setter
         */
        public function collapsed($collapsed = null)
        {
        }
        /**
         * Set collapsed alias
         *
         * @return \BracketSpace\Notification\Utils\Settings\Group $this
         */
        public function collapse()
        {
        }
        /**
         * Add Field to the Group
         *
         * @param array<mixed> $args field args.
         * @return \BracketSpace\Notification\Utils\Settings\Group $this
         * @throws \Exception Exception.
         */
        public function addField($args)
        {
        }
        /**
         * Get all registered Fields
         *
         * @return array<mixed>
         */
        public function getFields()
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Settings\CoreFields {
    /**
     * Number class
     */
    class Number
    {
        /**
         * Number field
         * Accepts addons: min, max, step
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param string $value saved value.
         * @return int|float     sanitized number
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Editor class
     */
    class Editor
    {
        /**
         * Editor field
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param string $value Saved value.
         * @return string        Sanitized content
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Url class
     */
    class Url
    {
        /**
         * Url field
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param string $value saved value.
         * @return string        sanitized url
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Select class
     */
    class Select
    {
        /**
         * Select field
         * You can define `multiple` addon to make it multiple
         * If you want to use Selectize.js, set `pretty` addon to true
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize select value
         * Uses sanitize_text_field()
         *
         * @param mixed $value saved value.
         * @return mixed          sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Checkbox class
     */
    class Checkbox
    {
        /**
         * Checkbox field
         * Requires 'label' addon
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize checkbox value
         * Allows only for empty string and 'true'
         *
         * @param string $value saved value.
         * @return string        empty string or 'true'
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Range class
     */
    class Range
    {
        /**
         * Range field
         * Accepts addons: min, max, step
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param mixed $value Saved value.
         * @return float        Sanitized number
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Message class
     */
    class Message
    {
        /**
         * Message field
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param string $value Saved value.
         * @return string        Sanitized text
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Text class
     */
    class Text
    {
        /**
         * Text field
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize input value
         *
         * @param string $value Saved value.
         * @return string        Sanitized text
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Image field class
     */
    class Image
    {
        /**
         * Image Field field
         * Requires 'label' addon
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         * @since 7.0.0
         */
        public function input($field)
        {
        }
        /**
         * Sanitize checkbox value
         * Allows only for empty string and 'true'
         *
         * @param string $value saved value.
         * @return string        empty string or 'true'
         * @since 7.0.0
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Button class
     */
    class Button
    {
        /**
         * Button field
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
        /**
         * Sanitize button URL
         *
         * @param string $value URL.
         * @return string       Sanitized URL
         */
        public function sanitize($value)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Settings {
    /**
     * Field class
     */
    class Field
    {
        /**
         * Group constructor
         *
         * @param string $handle Settings handle.
         * @param string $name Field name.
         * @param string $slug Field slug.
         * @param string $section Section slug.
         * @param string $group Group slug.
         * @throws \Exception Exception.
         */
        public function __construct($handle, $name, $slug, $section, $group)
        {
        }
        /**
         * Get or set name
         *
         * @param string $name Name. Do not pass anything to get current value.
         * @return string name
         */
        public function name($name = null)
        {
        }
        /**
         * Get or set slug
         *
         * @param string $slug Slug. Do not pass anything to get current value.
         * @return string slug
         */
        public function slug($slug = null)
        {
        }
        /**
         * Get or set section
         *
         * @param string $section Section. Do not pass anything to get current value.
         * @return string section
         */
        public function section($section = null)
        {
        }
        /**
         * Get or set group
         *
         * @param string $group Group. Do not pass anything to get current value.
         * @return string group
         */
        public function group($group = null)
        {
        }
        /**
         * Set or get description
         *
         * @param mixed $description string to set description, null to get it.
         * @return string description
         */
        public function description($description = null)
        {
        }
        /**
         * Get or set field value
         *
         * @param mixed $value field value or null to get current.
         * @return string value
         */
        public function value($value = null)
        {
        }
        /**
         * Set or get default value
         *
         * @param mixed $defaultValue field default value or null to get current.
         * @return string              default value
         */
        public function defaultValue($defaultValue = null)
        {
        }
        /**
         * Set or get addons
         *
         * @param mixed $addons field additional settings or null to get them.
         * @return array<mixed> addons
         */
        public function addons($addons = null)
        {
        }
        /**
         * Get addon
         *
         * @param mixed $addon field additional settings or null to get them.
         * @return mixed addon value or null
         */
        public function addon($addon = null)
        {
        }
        /**
         * Get Field input name
         *
         * @return string name
         */
        public function inputName()
        {
        }
        /**
         * Get Field input id
         *
         * @return string id
         */
        public function inputId()
        {
        }
        /**
         * Set field renderer
         *
         * @param mixed $renderer array or string.
         * @return \BracketSpace\Notification\Utils\Settings\Field
         * @throws \Exception Exception.
         */
        public function setRenderer($renderer)
        {
        }
        /**
         * Set field sanitizer
         *
         * @param mixed $sanitizer array or string.
         * @return \BracketSpace\Notification\Utils\Settings\Field
         * @throws \Exception Exception.
         */
        public function setSanitizer($sanitizer)
        {
        }
        /**
         * Render field
         *
         * @return void
         */
        public function render()
        {
        }
        /**
         * Sanitize field value
         *
         * @param mixed $value raw value for sanitization.
         * @return string sanitized value
         */
        public function sanitize($value)
        {
        }
    }
    /**
     * Settings class
     */
    class Section
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Section constructor
         *
         * @param string $handle Settings handle.
         * @param string $name Section name.
         * @param string $slug Section slug.
         * @throws \Exception Exception.
         */
        public function __construct($handle, $name, $slug)
        {
        }
        /**
         * Get or set name
         *
         * @param string $name Name. Do not pass anything to get current value.
         * @return string name
         */
        public function name($name = null)
        {
        }
        /**
         * Get or set slug
         *
         * @param string $slug Slug. Do not pass anything to get current value.
         * @return string slug
         */
        public function slug($slug = null)
        {
        }
        /**
         * Add Group to the section
         *
         * @param string $name Group name.
         * @param string $slug Group slug.
         * @return \BracketSpace\Notification\Utils\Settings\Group
         * @throws \Exception Exception.
         */
        public function addGroup($name, $slug)
        {
        }
        /**
         * Get all registered Groups
         *
         * @return array<mixed>
         */
        public function getGroups()
        {
        }
        /**
         * Get group by group slug
         *
         * @param string $slug group slug.
         * @return mixed        group object or false if no group defined
         */
        public function getGroup($slug = '')
        {
        }
    }
}
namespace BracketSpace\Notification\Utils\Settings\Fields {
    /**
     * NotificationLog class
     */
    class NotificationLog
    {
        /**
         * Field markup.
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
    }
    /**
     * Import class
     */
    class Import
    {
        /**
         * Field markup.
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
    }
    /**
     * ErrorLog class
     */
    class ErrorLog
    {
        /**
         * Field markup.
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
    }
    /**
     * Export class
     */
    class Export
    {
        /**
         * Field markup.
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
    }
    /**
     * SyncTable class
     */
    class SyncTable
    {
        /**
         * Field markup.
         *
         * @param \BracketSpace\Notification\Utils\Settings\Field $field Field instance.
         * @return void
         */
        public function input($field)
        {
        }
    }
}
namespace BracketSpace\Notification\Utils {
    /**
     * WpObjectHelper class
     */
    class WpObjectHelper
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Gets post type object
         *
         * @param string $postTypeSlug Post type slug.
         * @return \WP_Post_Type|null
         * @since  8.0.0
         */
        public static function getPostType($postTypeSlug)
        {
        }
        /**
         * Gets registered post types in slug => name format
         *
         * @param array<mixed> $args Query args.
         * @return array<string,string>
         * @since  8.0.0
         */
        public static function getPostTypes($args = []) : array
        {
        }
        /**
         * Gets post type object name
         *
         * @param string $postTypeSlug Post type slug.
         * @return string|null
         * @since  8.0.0
         */
        public static function getPostTypeName($postTypeSlug)
        {
        }
        /**
         * Gets taxonomy object
         *
         * @param string $taxonomySlug Taxonomy slug.
         * @return \WP_Taxonomy|null
         * @since  8.0.0
         */
        public static function getTaxonomy($taxonomySlug)
        {
        }
        /**
         * Gets registered taxonomies in slug => name format
         *
         * @param array<mixed> $args Query args.
         * @return array<string,\WP_Taxonomy>
         * @since  8.0.0
         */
        public static function getTaxonomies($args = []) : array
        {
        }
        /**
         * Gets taxonomy object name
         *
         * @param string $taxonomySlug Taxonomy slug.
         * @return string|null
         * @since  8.0.0
         */
        public static function getTaxonomyName($taxonomySlug)
        {
        }
        /**
         * Gets comment type name
         *
         * @param string $commentTypeSlug Comment type slug.
         * @return string|null
         * @since  8.0.0
         */
        public static function getCommentTypeName($commentTypeSlug)
        {
        }
        /**
         * Gets comment types from database
         *
         * @return array<string,string>
         * @since  8.0.0
         */
        public static function getCommentTypes() : array
        {
        }
    }
    /**
     * Allows plugins to use their own update API.
     *
     * @author Easy Digital Downloads
     * @version Release: 1.9.1
     */
    class EDDUpdater
    {
        /**
         * Class constructor.
         *
         * @param string $apiUrl The URL pointing to the custom API endpoint.
         * @param string $pluginFile Path to the plugin file.
         * @param array<mixed> $apiData Optional data to send with API calls.
         * @uses hook()
         *
         * @uses plugin_basename()
         */
        public function __construct($apiUrl, $pluginFile, $apiData = null)
        {
        }
        /**
         * Set up WordPress filters to hook into WP's update process.
         *
         * @return void
         * @uses add_filter()
         *
         */
        public function init()
        {
        }
        /**
         * Check for Updates at the defined API endpoint and modify the update array.
         *
         * This function dives into the update API just when WordPress creates its update array,
         * then adds a custom API call and injects the custom plugin data retrieved from the API.
         * It is reassembled from parts of the native WordPress plugin update code.
         * See wp-includes/update.php line 121 for the original wp_update_plugins() function.
         *
         * @param array<mixed> $transientData Update array build by WordPress.
         * @return array<mixed> Modified update array with custom plugin data.
         * @uses api_request()
         *
         */
        public function checkUpdate($transientData)
        {
        }
        /**
         * Get repo API data from store.
         * Save to cache.
         *
         * @return \stdClass|bool
         */
        public function getRepoApiData()
        {
        }
        /**
         * Show the update notification on multisite subsites.
         *
         * @param string $file
         * @param array<mixed> $plugin
         */
        public function showUpdateNotification($file, $plugin)
        {
        }
        /**
         * Updates information on the "View version x.x details" page with custom data.
         *
         * @param mixed $_data
         * @param string $_action
         * @param object $_args
         * @return object $_data
         * @uses api_request()
         *
         */
        public function pluginsApiFilter($_data, $_action = '', $_args = null)
        {
        }
        /**
         * Disable SSL verification in order to prevent download update failures
         *
         * @param array<mixed> $args
         * @param string $url
         * @return object $array
         */
        public function httpRequestArgs($args, $url)
        {
        }
        /**
         * If available, show the changelog for sites in a multisite install.
         */
        public function showChangelog()
        {
        }
        /**
         * Get the version info from the cache, if it exists.
         *
         * @param string $cacheKey
         * @return object
         */
        public function getCachedVersionInfo($cacheKey = '')
        {
        }
        /**
         * Adds the plugin version information to the database.
         *
         * @param string $value
         * @param string $cacheKey
         */
        public function setVersionInfoCache($value = '', $cacheKey = '')
        {
        }
    }
}
namespace BracketSpace\Notification\Cli {
    /**
     * Dump all hooks as add_filter() calls.
     */
    class DumpHooks
    {
        /**
         * Dump all the Dochooks.
         *
         * @param list<string> $args Arguments.
         * @return void
         */
        public function __invoke($args)
        {
        }
    }
}
namespace BracketSpace\Notification\Api\Controller {
    /**
     * RepeaterHandler class
     *
     * @action
     */
    class RepeaterController
    {
        /**
         * Post ID
         *
         * @var int
         */
        public $postId;
        /**
         * Carrier slug
         *
         * @var string
         */
        public $carrier;
        /**
         * Field slug
         *
         * @var string
         */
        public $field;
        /**
         * Forms field data
         *
         * @param array<mixed> $data Field data.
         * @return array<mixed>
         * @since 7.0.0
         */
        public function formFieldData($data = null)
        {
        }
        /**
         * Gets field values
         *
         * @param int $postId Post id.
         * @param string $carrier Carrier slug.
         * @param string $field Field slug.
         * @return array<mixed>
         * @since 7.0.0
         */
        public function getValues($postId, $carrier, $field)
        {
        }
        /**
         * Gets carrier fields
         *
         * @return array<mixed>
         * @since 7.0.0
         */
        public function getCarrierFields()
        {
        }
        /**
         * Normalize values array
         *
         * @param array<mixed> $values Field values.
         * @return array<mixed>
         * @since 7.0.0
         */
        public function normalizeValues($values)
        {
        }
        /**
         * Gets request params
         *
         * @param array<mixed> $params Request params.
         * @return void
         */
        public function parseParams($params)
        {
        }
        /**
         * Forms response data
         *
         * @return array<mixed>
         * @since 7.0.0
         */
        public function formData()
        {
        }
        /**
         * Sends response
         *
         * @param \WP_REST_Request $request WP request instance.
         * @return void
         * @since 7.0.0
         */
        public function sendResponse(\WP_REST_Request $request)
        {
        }
    }
    /**
     * RepeaterHandler class
     *
     * @action
     */
    class SectionRepeaterController extends \BracketSpace\Notification\Api\Controller\RepeaterController
    {
        /**
         * Group fields in associative array
         *
         * @param array<mixed> $fields Fields data.
         * @return  array<mixed>  Modified fields data.
         * @since 7.0.0
         */
        public function groupFields($fields)
        {
        }
        /**
         * Forms field data for sections
         *
         * @param array<mixed> $sections Sections data.
         * @return array<mixed>
         */
        public function getSectionsFields($sections)
        {
        }
        /**
         * Forms response data
         *
         * @return array<mixed>
         * @since 7.0.0
         */
        public function formData()
        {
        }
    }
    /**
     * REST api check controller class
     */
    class CheckRestApiController
    {
        /**
         * Sends response
         *
         * @return void
         * @since 8.0.12
         */
        public function sendResponse()
        {
        }
    }
    /**
     * RepeaterHandler class
     *
     * @action
     */
    class SelectInputController
    {
        /**
         * Sends response
         *
         * @param \WP_REST_Request $request WP request instance.
         * @return void
         * @since 7.0.0
         */
        public function sendResponse(\WP_REST_Request $request)
        {
        }
    }
}
namespace BracketSpace\Notification\Api {
    /**
     * Api class
     */
    class Api
    {
        /**
         * Endpoint namespace
         *
         * @var string
         */
        public $namespace = 'notification/v1';
        /**
         * Route configuration
         *
         * @var array<mixed>
         */
        public $routes = [];
        /**
         * Constructor method
         *
         * @return void
         * @since 7.0.0
         */
        public function __construct()
        {
        }
        /**
         * Registers rest api route.
         *
         * @action rest_api_init
         * @return void
         * @since 7.0.0
         */
        public function restApiInit()
        {
        }
        /**
         * Gets API endpoint
         *
         * @param string $endpoint Endopint name.
         * @return string
         * @since 8.0.13
         */
        public function getEndpoint($endpoint)
        {
        }
    }
}
namespace BracketSpace\Notification {
    /**
     * Error Handler class
     */
    class ErrorHandler
    {
        /**
         * Checks if debug is enabled.
         *
         * @return bool
         * @since  8.0.0
         */
        public static function debugEnabled()
        {
        }
        /**
         * Handles error
         * When debug is disabled it converts to a Warning.
         *
         * @param string $message Message.
         * @param string $exceptionClass Exception class name.
         * @return void
         * @throws \Exception If debug is enabled.
         * @since  8.0.0
         */
        public static function error(string $message, string $exceptionClass = 'Exception')
        {
        }
    }
}
namespace BracketSpace\Notification\Interfaces {
    /**
     * Storable interface
     */
    interface Storable
    {
    }
}
namespace BracketSpace\Notification\Store {
    /**
     * Recipient Store
     *
     * @todo Refactor the class so it uses Storage trait.
     */
    class Recipient implements \BracketSpace\Notification\Interfaces\Storable
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /**
         * Inserts a Recipient for specific Carrier.
         *
         * @param string $carrierSlug Carrier slug.
         * @param string $slug Recipient slug.
         * @param \BracketSpace\Notification\Interfaces\Receivable $recipient Recipient to add.
         * @return void
         * @since  8.0.0
         */
        public static function insert(string $carrierSlug, string $slug, \BracketSpace\Notification\Interfaces\Receivable $recipient)
        {
        }
        /**
         * Gets all items
         *
         * @return array<string, array<string, \BracketSpace\Notification\Interfaces\Receivable>>
         * @since  8.0.0
         */
        public static function all() : array
        {
        }
        /**
         * Removes all items from the store
         *
         * @return void
         * @since  8.0.0
         */
        public static function clear()
        {
        }
        /**
         * Gets all Recipients for specific Carrier
         *
         * @param string $carrierSlug Carrier slug.
         * @return array<string, \BracketSpace\Notification\Interfaces\Receivable>
         * @since  8.0.0
         */
        public static function allForCarrier(string $carrierSlug) : array
        {
        }
        /**
         * Gets Recipient for Carrier by a slug
         *
         * @param string $carrierSlug Carrier slug.
         * @param string $slug Recipient slug.
         * @return mixed
         * @since  8.0.0
         */
        public static function get(string $carrierSlug, $slug)
        {
        }
    }
    /**
     * Global Merge Tag Store
     */
    class GlobalMergeTag implements \BracketSpace\Notification\Interfaces\Storable
    {
        /** @use Storage<Interfaces\Taggable> */
        use \BracketSpace\Notification\Traits\Storage;
    }
    /**
     * Resolver Store
     */
    class Resolver implements \BracketSpace\Notification\Interfaces\Storable
    {
        /** @use Storage<Interfaces\Resolvable> */
        use \BracketSpace\Notification\Traits\Storage;
        /**
         * Gets all Resolvers sorted by priority.
         *
         * @return array<Interfaces\Resolvable>
         * @since  8.0.0
         */
        public static function sorted() : array
        {
        }
    }
    /**
     * Carrier Store
     */
    class Carrier implements \BracketSpace\Notification\Interfaces\Storable
    {
        /** @use Storage<Interfaces\Sendable> */
        use \BracketSpace\Notification\Traits\Storage;
    }
    /**
     * Trigger Store
     */
    class Trigger implements \BracketSpace\Notification\Interfaces\Storable
    {
        /** @use Storage<Interfaces\Triggerable> */
        use \BracketSpace\Notification\Traits\Storage;
        /**
         * Gets all Triggers grouped.
         *
         * @return array<string, array<string, Interfaces\Triggerable>>
         * @since  8.0.0
         */
        public static function grouped() : array
        {
        }
    }
    /**
     * Notification Store
     */
    class Notification implements \BracketSpace\Notification\Interfaces\Storable
    {
        use \BracketSpace\Notification\Dependencies\Micropackage\Casegnostic\Casegnostic;
        /** @use Storage<CoreNotification> */
        use \BracketSpace\Notification\Traits\Storage;
        /**
         * Gets the Notifications with specific Trigger
         *
         * @param string $triggerSlug Trigger slug.
         * @return array<int,CoreNotification>
         * @since  6.0.0
         * @since  8.0.0 Is static method
         */
        public static function withTrigger($triggerSlug)
        {
        }
    }
}
namespace {
    /**
     * Gets cached value or cache object
     *
     * @since      7.0.0
     * @deprecated 8.0.0
     * @return     null
     */
    function notification_cache()
    {
    }
    /**
     * Checks if the Wizard should be displayed.
     *
     * @since      6.3.0
     * @deprecated 8.0.0
     * @return     bool
     */
    function notification_display_wizard()
    {
    }
    /**
     * Creates new AJAX Handler object.
     *
     * @since      6.0.0
     * @since      7.0.0 Using Ajax Micropackage.
     * @deprecated 8.0.0
     * @return     BracketSpace\Notification\Dependencies\Micropackage\Ajax\Response
     */
    function notification_ajax_handler()
    {
    }
    /**
     * Gets one of the plugin filesystems
     *
     * @since      7.0.0
     * @deprecated 8.0.0
     * @param      string $deprecated Filesystem name.
     * @return     BracketSpace\Notification\Dependencies\Micropackage\Filesystem\Filesystem
     */
    function notification_filesystem($deprecated)
    {
    }
    /**
     * Gets all notification posts with enabled trigger.
     *
     * @todo This function needs to be fixed because we are no longer storing
     *       the Trigger in Notification post meta.
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      mixed $trigger_slug Trigger slug or null if all posts should be returned.
     * @param      bool  $all          If get all posts or just active.
     * @return     array
     */
    function notification_get_posts($trigger_slug = \null, $all = \false)
    {
    }
    /**
     * Gets notification post by its hash.
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $hash Notification unique hash.
     * @return     mixed        null or Notification object
     */
    function notification_get_post_by_hash($hash)
    {
    }
    /**
     * Checks if notification post has been just started
     *
     * @since      6.0.0 We are using Notification Post object.
     * @deprecated 8.0.0
     * @param      mixed $post Post ID or WP_Post.
     * @return     boolean     True if notification has been just started
     */
    function notification_post_is_new($post)
    {
    }
    /**
     * Prints the template
     * Wrapper for micropackage's template function
     *
     * @since      7.0.0
     * @deprecated 8.0.0
     * @param      string $template_name Template name.
     * @param      array  $vars          Template variables.
     *                                   Default: empty.
     * @return     void
     */
    function notification_template($template_name, $vars = [])
    {
    }
    /**
     * Gets the template
     * Wrapper for micropackage's get_template function
     *
     * @since      7.0.0
     * @deprecated 8.0.0
     * @param      string $template_name Template name.
     * @param      array  $vars          Template variables.
     *                                   Default: empty.
     * @return     string
     */
    function notification_get_template($template_name, $vars = [])
    {
    }
    /**
     * Enables the notification syncing
     * By default path used is current theme's `notifications` dir.
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      mixed $path full json directory path or null to use default.
     * @return     void
     */
    function notification_sync($path = \null)
    {
    }
    /**
     * Gets the synchronization path.
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @return     string|null
     */
    function notification_get_sync_path()
    {
    }
    /**
     * Checks if synchronization is active.
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @return     boolean
     */
    function notification_is_syncing()
    {
    }
    /**
     * Sets the plugin in white label mode.
     *
     * @since      5.0.0
     * @deprecated 8.0.0
     * @param      array $args white label args.
     * @return     void
     */
    function notification_whitelabel($args = [])
    {
    }
    /**
     * Checks if the plugin is in white label mode.
     *
     * @since      5.0.0
     * @deprecated 8.0.0
     * @return     bool
     */
    function notification_is_whitelabeled()
    {
    }
    /**
     * Registers Carrier
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Carrier Store.
     * @deprecated 8.0.0
     * @param      Interfaces\Sendable $carrier Carrier object.
     * @return     void
     */
    function notification_register_carrier(\BracketSpace\Notification\Interfaces\Sendable $carrier)
    {
    }
    /**
     * Gets all registered Carriers
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Carrier Store.
     * @deprecated 8.0.0
     * @return     array<string,Interfaces\Sendable>
     */
    function notification_get_carriers()
    {
    }
    /**
     * Gets single registered Carrier
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $carrier_slug Carrier slug.
     * @return     Interfaces\Sendable|null
     */
    function notification_get_carrier($carrier_slug)
    {
    }
    /**
     * Registers recipient
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Recipient Store
     * @deprecated 8.0.0
     * @param      string                $carrier_slug Carrier slug.
     * @param      Interfaces\Receivable $recipient    Recipient object.
     * @return     void
     */
    function notification_register_recipient($carrier_slug, \BracketSpace\Notification\Interfaces\Receivable $recipient)
    {
    }
    /**
     * Gets all registered recipients
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Recipient Store
     * @deprecated 8.0.0
     * @return     array<string,array<string,Interfaces\Receivable>>
     */
    function notification_get_recipients()
    {
    }
    /**
     * Gets registered recipients for specific Carrier
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $carrier_slug Carrier slug.
     * @return     array<string,Interfaces\Receivable>
     */
    function notification_get_carrier_recipients($carrier_slug)
    {
    }
    /**
     * Gets single registered recipient for specific Carrier
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $carrier_slug   Carrier slug.
     * @param      string $recipient_slug Recipient slug.
     * @return     Interfaces\Receivable|null
     */
    function notification_get_recipient($carrier_slug, $recipient_slug)
    {
    }
    /**
     * Parses recipient raw value to values which can be used by notifications
     *
     * @since      5.0.0
     * @since      6.0.0 Changed naming convention from Notification to Carrier.
     * @deprecated 8.0.0
     * @param      string $carrier_slug        Slug of the Carrier.
     * @param      string $recipient_type      Slug of the Recipient.
     * @param      mixed  $recipient_raw_value Raw value.
     * @return     mixed                       Parsed value
     */
    function notification_parse_recipient($carrier_slug, $recipient_type, $recipient_raw_value)
    {
    }
    /**
     * Adds Resolver to Store
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Resolver Store.
     * @deprecated 8.0.0
     * @param      Interfaces\Resolvable $resolver Resolver object.
     * @return     void
     */
    function notification_register_resolver(\BracketSpace\Notification\Interfaces\Resolvable $resolver)
    {
    }
    /**
     * Resolves the value
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Resolver Store.
     * @deprecated 8.0.0
     * @param      string                 $value   Unresolved string with tags.
     * @param      Interfaces\Triggerable $trigger Trigger object.
     * @return     string                         Resolved value
     */
    function notification_resolve($value, \BracketSpace\Notification\Interfaces\Triggerable $trigger)
    {
    }
    /**
     * Clears all Merge Tags
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $value Unresolved string with tags.
     * @return     string        Value without any tags
     */
    function notification_clear_tags($value)
    {
    }
    /**
     * Adds Trigger to Store
     *
     * @since  6.0.0
     * @since  6.3.0 Uses Trigger Store
     * @param  Interfaces\Triggerable $trigger trigger object.
     * @return void
     */
    function notification_register_trigger(\BracketSpace\Notification\Interfaces\Triggerable $trigger)
    {
    }
    /**
     * Gets all registered triggers
     *
     * @since      6.0.0
     * @since      6.3.0 Uses Trigger Store
     * @deprecated 8.0.0
     * @return     array<string,Interfaces\Triggerable>
     */
    function notification_get_triggers()
    {
    }
    /**
     * Gets single registered trigger
     *
     * @since      6.0.0
     * @deprecated 8.0.0
     * @param      string $trigger_slug trigger slug.
     * @return     Interfaces\Triggerable|null
     */
    function notification_get_trigger($trigger_slug)
    {
    }
    /**
     * Gets all registered triggers in a grouped array
     *
     * @since      5.0.0
     * @deprecated 8.0.0
     * @return     array<string,array<string, Interfaces\Triggerable>>
     */
    function notification_get_triggers_grouped()
    {
    }
    /**
     * Adds global Merge Tags for all Triggers
     *
     * @since      5.1.3
     * @deprecated 8.0.0
     * @param      Interfaces\Taggable $merge_tag Merge Tag object.
     * @return     Interfaces\Taggable
     */
    function notification_add_global_merge_tag(\BracketSpace\Notification\Interfaces\Taggable $merge_tag)
    {
    }
    /**
     * Gets all global Merge Tags
     *
     * @since      5.1.3
     * @deprecated 8.0.0
     * @return     array<string,Interfaces\Taggable>
     */
    function notification_get_global_merge_tags()
    {
    }
    /**
     * Adapts Notification object
     * Default adapters are: WordPress || JSON
     *
     * @param string $adapterName Adapter class name.
     * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
     * @return \BracketSpace\Notification\Interfaces\Adaptable
     * @since  6.0.0
     * @deprecated [Next]
     */
    function notification_adapt($adapterName, \BracketSpace\Notification\Core\Notification $notification)
    {
    }
    /**
     * Adapts Notification from input data
     * Default adapters are: WordPress || JSON
     *
     * @param string $adapterName Adapter class name.
     * @param mixed $data Input data needed by adapter.
     * @return \BracketSpace\Notification\Interfaces\Adaptable
     * @since  6.0.0
     * @deprecated [Next]
     */
    function notification_adapt_from($adapterName, $data)
    {
    }
    /**
     * Changes one adapter to another
     *
     * @param string $newAdapterName Adapter class name.
     * @param \BracketSpace\Notification\Interfaces\Adaptable $adapter Adapter.
     * @return \BracketSpace\Notification\Interfaces\Adaptable
     * @since  6.0.0
     * @deprecated [Next]
     */
    function notification_swap_adapter($newAdapterName, \BracketSpace\Notification\Interfaces\Adaptable $adapter)
    {
    }
    /**
     * Logs the message in database
     *
     * @since  6.0.0
     * @deprecated [Next]
     * @param string $component Component nice name, like `Core` or `Any Plugin Name`.
     * @param string $type Log type, values: notification|error|warning.
     * @param string $message Log formatted message.
     * @return bool|\WP_Error
     */
    function notification_log($component, $type, $message)
    {
    }
    /**
     * Adds Notification to Store
     *
     * @since  6.0.0
     * @deprecated [Next]
     * @param \BracketSpace\Notification\Core\Notification $notification Notification object.
     * @return void
     */
    function notification_add(\BracketSpace\Notification\Core\Notification $notification)
    {
    }
    /**
     * Converts the static data to Trigger and Carrier objects
     *
     * If no `trigger` nor `carriers` keys are available it does nothing.
     * If the data is already in form of objects it does nothing.
     *
     * @param array<mixed> $data Notification static data.
     * @return array<mixed>       Converted data.
     * @since  6.0.0
     * @deprecated [Next]
     */
    function notification_convert_data($data = [])
    {
    }
    /**
     * Registers settings
     *
     * @param mixed $callback Callback for settings registration, array of string.
     * @param int $priority Action priority.
     * @return void
     * @since  5.0.0
     * @deprecated [Next]
     */
    function notification_register_settings($callback, $priority = 10)
    {
    }
    /**
     * Gets setting values
     *
     * @return mixed
     * @since 5.0.0
     * @deprecated [Next]
     */
    function notification_get_settings()
    {
    }
    /**
     * Gets single setting value
     *
     * @param string $setting setting name in `a/b/c` format.
     * @return mixed
     * @since  5.0.0
     * @since  7.0.0 The `notifications` section has been changed to `carriers`.
     * @deprecated [Next]
     */
    function notification_get_setting($setting)
    {
    }
    /**
     * Updates single setting value.
     *
     * @deprecated [Next]
     * @param string $setting setting name in `a/b/c` format.
     * @param mixed $value setting value.
     * @return  mixed
     */
    function notification_update_setting($setting, $value)
    {
    }
    /**
     * Creates new Notification from array
     *
     * @since  6.0.0
     * @deprecated [Next]
     * @param NotificationUnconvertedData $data Notification data.
     * @return void
     */
    function notification($data = [])
    {
    }
    /**
     * Deprecation helpers
     *
     * @package notification
     */
    /**
     * Helper function.
     * Throws a deprecation notice from deprecated class
     *
     * @since  6.0.0
     * @param  string $class       Deprecated class name.
     * @param  string $version     Version since deprecated.
     * @param  string $replacement Replacement class.
     * @return void
     */
    function notification_deprecated_class($class, $version, $replacement = \null)
    {
    }
    /**
     * Form table row template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $field = $get('current_field');
    /**
     * Extension box template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $ext = $get('extension');
    /**
     * Premium Extension box template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $ext = $get('extension');
    /** @var mixed $license */
    $license = $ext['license']->get();
    /**
     * Inactive license warning
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $extensionList = \implode(', ', \array_map(static fn($ext) => \str_replace('Notification : ', '', $ext), $get('extensions')));
    /**
     * Save notification metabox
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     * @var \BracketSpace\Notification\Core\Notification $notification
     */
    $notification = $get('notification');
    /**
     * Merge tag template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $tag = $get('tag');
    /**
     * Export notifications form
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    // phpcs:disable Squiz.NamingConventions.ValidVariableName.NotCamelCaps
    /** @var array<\BracketSpace\Notification\Defaults\Adapter\WordPress> $notifications */
    $notifications = $get('notifications');
    /**
     * Error log template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $logs = $get('logs');
    /**
     * Notification log template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $logs = $get('logs');
    /**
     * Log pagination template
     *
     * @package notification
     *
     * @var callable(string $varName, string $default=): mixed $get Variable getter.
     * @var callable(string $varName, string $default=): void $the Variable printer.
     * @var callable(string $varName, string $default=): void $the_esc Escaped variable printer.
     * @var \BracketSpace\Notification\Dependencies\Micropackage\Templates\Template $this Template instance.
     */
    $links = \paginate_links(['base' => \admin_url('edit.php?post_type=notification&page=settings&section=debugging&' . $get('query_arg') . '=%#%'), 'current' => $get('current'), 'total' => $get('total')]);
    function upsertAndGet($notification)
    {
    }
    /**
     * PHPUnit bootstrap file
     *
     * @package notification
     */
    \define('NOTIFICATION_DOING_TESTS', \true);
    \define('NOTIFICATION_DEBUG', \true);
    \define('DOING_TESTS', \true);
    \define('WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path);
}
