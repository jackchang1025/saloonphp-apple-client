<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasSecFetch
{
    public function bootHasSecFetch(PendingRequest $pendingRequest): void
    {
        /*
         * Sec-Fetch-Dest: 'empty'表示请求的目标类型
         * 'empty' 值表示这是一个不针对特定资源类型的请求，通常用于API调用或XHR请求
         * Sec-Fetch-Mode: 'cors'指定请求的模式
         * 'cors' 表示这是一个跨源资源共享请求，允许在遵守CORS规则的情况下从不同的源获取资源
         * Sec-Fetch-Site: 'same-origin'指示请求的来源与目标的关系
         * 'same-origin' 表示请求来自同一个源（同一域名、协议和端口）
         * Sec-Fetch-Storage-Access: 'active'指示对存储访问的请求状态
         * 'active' 表示请求需要积极访问存储内容，如cookie或本地存储
         * Sec-Fetch-User: '?1'指示请求是否由用户操作触发
         * '?1' 表示请求可能由用户操作触发（如点击链接或按钮）
         */
        $pendingRequest->headers()->add('Sec-Fetch-Dest', 'empty');
        $pendingRequest->headers()->add('Sec-Fetch-Mode', 'cors');
        $pendingRequest->headers()->add('Sec-Fetch-Site', 'same-origin');
        // $pendingRequest->headers()->add('Sec-Fetch-Storage-Access', 'active');
        // $pendingRequest->headers()->add('Sec-Fetch-User', '?1');
    }
}
