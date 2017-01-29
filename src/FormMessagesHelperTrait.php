<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 12/6/2016
 * Time: 11:12 PM
 */

declare(strict_types = 1);

namespace Dot\Helpers;

/**
 * Class FormMessagesHelperTrait
 * @package Dot\Helpers
 */
trait FormMessagesHelperTrait
{
    /**
     * Returns an array of string representing the error messages, without any field association
     *
     * @param array $formMessages
     * @return array
     */
    protected function getFormMessages(array $formMessages): array
    {
        $messages = [];
        foreach ($formMessages as $message) {
            if (is_array($message)) {
                foreach ($message as $m) {
                    if (is_string($m)) {
                        $messages[] = $m;
                    } elseif (is_array($m)) {
                        $messages = array_merge($messages, $this->getFormMessages($m));
                    }
                }
            } elseif (is_string($message)) {
                $messages[] = $message;
            }
        }

        return $messages;
    }

    /**
     * Returns the form errors messages, keeping the form input hierarchy and associations
     *
     * @param array $formMessages
     * @return array
     */
    protected function getFormErrors(array $formMessages): array
    {
        $errors = [];
        foreach ($formMessages as $key => $message) {
            if (is_array($message)) {
                if (!isset($errors[$key])) {
                    $errors[$key] = array();
                }

                foreach ($message as $k => $m) {
                    if (is_string($m)) {
                        $errors[$key][] = $m;
                    } elseif (is_array($m)) {
                        $errors[$key][$k] = $this->getFormErrors($m);
                    }
                }
            } elseif (is_string($message)) {
                $errors[] = $message;
            }
        }

        return $errors;
    }
}
