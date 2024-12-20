<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/experiment_service.proto

namespace Google\Ads\GoogleAds\V16\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [ExperimentService.EndExperiment][google.ads.googleads.v16.services.ExperimentService.EndExperiment].
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.services.EndExperimentRequest</code>
 */
class EndExperimentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the campaign experiment to end.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $experiment = '';
    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     */
    protected $validate_only = false;

    /**
     * @param string $experiment Required. The resource name of the campaign experiment to end.
     *
     * @return \Google\Ads\GoogleAds\V16\Services\EndExperimentRequest
     *
     * @experimental
     */
    public static function build(string $experiment): self
    {
        return (new self())
            ->setExperiment($experiment);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $experiment
     *           Required. The resource name of the campaign experiment to end.
     *     @type bool $validate_only
     *           If true, the request is validated but not executed. Only errors are
     *           returned, not results.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Services\ExperimentService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the campaign experiment to end.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getExperiment()
    {
        return $this->experiment;
    }

    /**
     * Required. The resource name of the campaign experiment to end.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setExperiment($var)
    {
        GPBUtil::checkString($var, True);
        $this->experiment = $var;

        return $this;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

