<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\Comment;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class CommentUnstableTest extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "unstable";

        $this->test_session = new Session("session_id", "test-shop.myshopify.io", true, "1234");
        $this->test_session->setAccessToken("this_is_a_test_token");
    }

    /**

     *
     * @return void
     */
    public function test_1(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments.json?article_id=134645308&blog_id=241253187",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::all(
            $this->test_session,
            [],
            ["article_id" => 134645308, "blog_id" => 241253187],
        );
    }

    /**

     *
     * @return void
     */
    public function test_2(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments.json?blog_id=241253187",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::all(
            $this->test_session,
            [],
            ["blog_id" => 241253187],
        );
    }

    /**

     *
     * @return void
     */
    public function test_3(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::all(
            $this->test_session,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_4(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments.json?since_id=118373535",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::all(
            $this->test_session,
            [],
            ["since_id" => 118373535],
        );
    }

    /**

     *
     * @return void
     */
    public function test_5(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/count.json?article_id=134645308&blog_id=241253187",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::count(
            $this->test_session,
            [],
            ["article_id" => 134645308, "blog_id" => 241253187],
        );
    }

    /**

     *
     * @return void
     */
    public function test_6(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/count.json?blog_id=241253187",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::count(
            $this->test_session,
            [],
            ["blog_id" => 241253187],
        );
    }

    /**

     *
     * @return void
     */
    public function test_7(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/count.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::count(
            $this->test_session,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_8(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/118373535.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Comment::find(
            $this->test_session,
            118373535,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_9(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/118373535.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["comment" => ["id" => 118373535, "body" => "You can even update through a web service.", "author" => "Your new name", "email" => "your@updated-email.com", "published_at" => "2022-02-03T22:13:53.233Z"]]),
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 118373535;
        $comment->body = "You can even update through a web service.";
        $comment->author = "Your new name";
        $comment->email = "your@updated-email.com";
        $comment->published_at = "2022-02-03T22:13:53.233Z";
        $comment->save();
    }

    /**

     *
     * @return void
     */
    public function test_10(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["comment" => ["body" => "I like comments\nAnd I like posting them *RESTfully*.", "author" => "Your name", "email" => "your@email.com", "ip" => "107.20.160.121", "blog_id" => 241253187, "article_id" => 134645308]]),
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->body = "I like comments\nAnd I like posting them *RESTfully*.";
        $comment->author = "Your name";
        $comment->email = "your@email.com";
        $comment->ip = "107.20.160.121";
        $comment->blog_id = 241253187;
        $comment->article_id = 134645308;
        $comment->save();
    }

    /**

     *
     * @return void
     */
    public function test_11(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/653537639/spam.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 653537639;
        $comment->spam(
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_12(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/653537639/not_spam.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 653537639;
        $comment->not_spam(
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_13(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/653537639/approve.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 653537639;
        $comment->approve(
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_14(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/653537639/remove.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 653537639;
        $comment->remove(
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_15(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/unstable/comments/653537639/restore.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $comment = new Comment($this->test_session);
        $comment->id = 653537639;
        $comment->restore(
            [],
        );
    }

}
