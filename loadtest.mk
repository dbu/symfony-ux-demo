LOADTEST_HOST ?= https://localhost
LOADTEST_REQUESTS ?= 1000
LOADTEST_CONCURRENCY ?= 20
STREAMS_MESSAGE ?= load-test-message

loadtest: ## Run ApacheBench against a path, pass the parameter "path=" to override, example: make loadtest path=/plain/slow
	@$(eval path ?=/)
	ab -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)$(path)

loadtest-home: ## Run ApacheBench against the homepage
	ab -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)/

loadtest-plain-slow: ## Run ApacheBench against the plain slow page
	ab -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)/plain/slow

loadtest-turbo-drive-slow: ## Run ApacheBench against the turbo drive slow page
	ab -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)/turbo-drive/slow

loadtest-streams: ## Run ApacheBench against the streams endpoint with a fixed message body
	@body_file=$$(mktemp); \
	printf 'message=%s\n' "$(STREAMS_MESSAGE)" > "$$body_file"; \
	ab -p "$$body_file" -T application/x-www-form-urlencoded -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)/streams; \
	rm -f "$$body_file"

loadtest-sse: ## Run ApacheBench against the streams endpoint with a fixed message body
	@body_file=$$(mktemp); \
	printf 'message=%s\n' "$(STREAMS_MESSAGE)" > "$$body_file"; \
	ab -p "$$body_file" -T application/x-www-form-urlencoded -n $(LOADTEST_REQUESTS) -c $(LOADTEST_CONCURRENCY) $(LOADTEST_HOST)/sse; \
	rm -f "$$body_file"
